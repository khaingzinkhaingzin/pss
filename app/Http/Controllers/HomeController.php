<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Carbon\Carbon;

use App\CategoryType;
use App\SaleProduct;
use App\Cost;
use App\PhoneDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $saleproducts = SaleProduct::all();
        foreach($saleproducts as $saleproduct) {
            if($saleproduct->quantity == 0 ) {
                SaleProduct::destroy($saleproduct->id);
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // latest
        $latest_products = SaleProduct::where('category_type', 'Smartphone')
        ->orderBy('created_at', 'desc')->paginate(4);
        $costs = Cost::all();

        // popular
        $date = Carbon::now();
        $month = Carbon::parse($date)->format('F');
        $year = Carbon::parse($date)->format('Y');
        $my = $month . " " . $year;

        $collection = new Collection;
        $new_collection = new Collection;
        $cost_ary = [];
        
        $costs_my = Cost::where('sale_or_service', 0)->where('category_type', 'Smartphone')
        ->where('month_year', $my)->get();
        foreach($costs_my as $cost_my) {
            $price = PhoneDetail::where('model', $cost_my->model)
            ->where('color', $cost_my->color)->value('price');
            $collection->push([
                'category' => $cost_my->category,
                'brand' => $cost_my->brand,
                'model' => $cost_my->model,
                'color' => $cost_my->color,
                'qty' => $cost_my->quantity,
                'price' => $price,
                'image' => $cost_my->image,
            ]);
        }
        // var_dump($collection);
        foreach($collection as $col) {
            if(count($new_collection) == 0) {
                $new_collection->push([
                    'category' => $col['category'],
                    'brand' => $col['brand'],
                    'model' => $col['model'],
                    'color' => $col['color'],
                    'quantity' => $col['qty'],
                    'price' => $col['price'],
                    'image' => $col['image'],
                ]);
            }
            else {
                $already = null;
                foreach($new_collection as $new_col) {
                    if($new_col['model'] == $col['model'] && $new_col['color'] == $col['color']) {
                        $already = 'yes';     
                    }
                }
                if($already == null) {
                    $new_collection->push([
                        'category' => $col['category'],
                        'brand' => $col['brand'],
                        'model' => $col['model'],
                        'color' => $col['color'],
                        'quantity' => $col['qty'],
                        'price' => $col['price'],
                        'image' => $col['image'],
                    ]);
                }
            }
        }
        // var_dump($new_collection);
        foreach ($new_collection as $new_col) {
            $qty = 0;
            foreach ($collection as $col) {
                if($new_col['model'] == $col['model'] && $new_col['color'] == $col['color']) {
                    $qty += $col['qty'];
                }
            }
            $qty_ary['quantity'] = $qty;
            $cost_ary[] = array_merge($new_col, $qty_ary); 
        }
        // var_dump($cost_ary);

        $sale_products = SaleProduct::where('category_type', 'Smartphone')
        ->get();
        $popular_products = new Collection;
        $sale_item_count = new Collection;
        foreach($cost_ary as $c_ary) {
            $remaining = null;
            $sale_qty = 0;
            $qty = 0;
            $popularid = 0;
            foreach($sale_products as $sale_product) {
                if($sale_product->model == $c_ary['model'] && $sale_product->color == $c_ary['color']) {
                    $sale_qty = $sale_product->quantity; 
                    $remaining = 'yes';
                    $popularid = $sale_product->id;
                }
            }
            if($remaining == null) {
                $qty = $c_ary['quantity'];
                $sale_item_count->push([
                    'id' => $popularid,
                    'category' => $c_ary['category'],
                    'brand' => $c_ary['brand'],
                    'model' => $c_ary['model'],
                    'color' => $c_ary['color'],
                    'qty' => $qty,
                    'price' => $c_ary['price'],
                    'image' => $c_ary['image'],
                ]);

            }
            else {
                $qty = $c_ary['quantity'] - $sale_qty;
                $sale_item_count->push([
                    'id' => $popularid,
                    'category' => $c_ary['category'],
                    'brand' => $c_ary['brand'],
                    'model' => $c_ary['model'],
                    'color' => $c_ary['color'],
                    'qty' => $qty,
                    'price' => $c_ary['price'],
                    'image' => $c_ary['image'],
                ]);
            }
        }
        $popular_products = $sale_item_count->sortByDesc('qty')->take(4);

        //Feature
        $feature_products = \DB::table('sale_products')->where('category_type', 'Feature')->paginate(3);
        return view('home', compact('categorytypes', 'latest_products', 'costs', 'popular_products',
    'feature_products'));
    }
}
