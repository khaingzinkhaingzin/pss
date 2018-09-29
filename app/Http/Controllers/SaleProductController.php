<?php

namespace App\Http\Controllers;

use App\SaleProduct;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class SaleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $saleproducts = SaleProduct::all();
        foreach ($saleproducts as $saleproduct) {
            if($saleproduct->quantity == 0) {
                SaleProduct::destroy($saleproduct->id);
            }
        }
    }

    public function index()
    {
        //

        return view('saleproduct.index');
    }

    public function data(Request $request) {
        $model = new Collection;

        if($request->ajax()) {
            $saleproducts = SaleProduct::all();
            foreach ($saleproducts as $saleproduct) {
                $model->push([
                    'id' => $saleproduct->id,
                    'category' => $saleproduct->category,
                    'brand' => $saleproduct->brand,
                    'model' => $saleproduct->model,
                    'color' => $saleproduct->color,
                    'quantity' => $saleproduct->quantity,
                    'image' => $saleproduct->image,
                ]);
            }

            return Datatables::of($model)
            ->addColumn('image', function($model) {
                $data = "<img src='../../storage/images/".$model['image']."' 
                alt='' width='100' height='100'>";
                return $data;
            })
            ->addColumn('add-openning-cost', function($model) {
                return view('saleproduct.partials.openning_cost', compact('model'));
            })
            ->rawColumns(['image', 'add-openning-cost'])
            ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleProduct $saleProduct)
    {
        //
    }

    public function addOpenningCost($model, $color) {
        $sale_product = SaleProduct::where('model', $model)
        ->where('color', $color)->first();
        $cost = Cost::where('model', $model)
        ->where('color', $color)->first();
        $qty = $sale_product->quantity;
        $c = $qty * $cost->price;
        $date = Carbon::now(); 
        $day = Carbon::parse($date)->format('d');
        $month = Carbon::parse($date)->format('F');
        $year = Carbon::parse($date)->format('Y');
        $m_y = $month . " " . $year;
        Cost::create([
            'category_type' => $cost->category_type,
            'category' => $cost->category,
            'brand' => $cost->brand,
            'model' => $cost->model,
            'color' => $cost->color,
            'quantity' => $qty,
            'price' => $cost->price,
            'cost' => $c,
            'sale_or_service' => $cost->sale_or_service,
            'day' => $day,
            'month_year' => $m_y,
        ]);

        return redirect('costs');
    }
}
