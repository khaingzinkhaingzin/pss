<?php

namespace App\Http\Controllers;

use App\CategoryType;
use App\SaleProduct;
use App\PhoneDetail;
use App\FeaturedDetail;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;

use Yajra\Datatables\Datatables;

class CategoryTypeController extends Controller
{
    
    public function index()
    {
        //
        $user = \Auth::user();
        $id = $user->id;
        $role_users = \DB::table('role_users')->get();
        $authorize = null;
        foreach($role_users as $role_user) {
            if($id == $role_user->user_id) {
                $authorize = 'yes';
            }
        }
        if($user->is_admin == 1 || $authorize != null) {
            return view('category_type.index');
        }
    }

    public function data(Request $request) {

        // First Way

        // if($request->ajax()) {
        //     $model = Category::query();
        //     return Datatables::of($model)
        //         ->addColumn("edit", function($model) {
        //             $data = "<a class='btn btn-success' href=" . route("categories.edit", $model->id) . ">Edit</a>";
        //             return $data;
        //         })
        //         ->addColumn("delete", function($model) {
        //             $data = '<form action="' . route('categories.destroy', $model->id). '" method="post">'
        //                         . csrf_field() .
        //                          method_field("delete") .
        //                         '<button class="btn btn-danger">Delete</button>
        //                     </form>';
        //             return $data;
        //         })
        //         ->rawColumns(['edit', 'delete'])
        //         ->toJson();
        // }
        // return abort(404); 

        // Second Way

        $model = new Collection;
        if($request->ajax()) {
            $datas = CategoryType::all();

            foreach ($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'name' => $value->name,
                ]);
            }

            return Datatables::of($model)
            ->addColumn('edit', function($model) {
                return view('category_type.partials.edit_btn', compact('model'))->render();
            })
            ->addColumn('delete', function($model) {
                return view('category_type.partials.delete_btn', compact('model'))->render();
            })
            ->rawColumns(['edit', 'delete'])
            ->make('ture');
        }

        return abort(404);

    }

    public function create()
    {
        //
        return view('category_type.create');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        $categorytypes = CategoryType::all();

        if(count($categorytypes) == 0) {
            CategoryType::create([
                'name' => $request->name,
            ]);
        }

        else {
            $already = null;
            foreach ($categorytypes as $categorytype) {
                $cate = Str::lower($categorytype->name);
                $r_category = Str::lower($request->name);
                if($cate == $r_category) {
                    $already = 'yes';
                }
            }

            if($already == null) {
                CategoryType::create([
                    'name' => $request->name,
                ]);
            }
        }

        return redirect('/categorytypes');
    }

    public function show($name)
    {
        //
        $dec_categorytype = Crypt::decrypt($name);

        $collection = new Collection;
        $new_collection = new Collection;

        $unique_brand = new Collection;
        $unique_category = new Collection;

        $sale_products = SaleProduct::where('category_type', $dec_categorytype)->get();
        foreach($sale_products as $sale_product) {
            $collection->push([
                'id' => $sale_product->id,
                'brand' => $sale_product->brand,
                'category' => $sale_product->category,
            ]);
        }

        $unique_brand = $collection->unique('brand');
        $unique_category = $collection->unique('category');

        foreach($sale_products as $sale_product) {
            if($dec_categorytype == 'Smartphone' || $dec_categorytype == 'Tablet') {
                $price = PhoneDetail::where('model', $sale_product->model)
                ->where('color', $sale_product->color)->value('price');
            }
            else {
                $price = FeaturedDetail::where('model', $sale_product->model)
                ->where('color', $sale_product->color)->value('price');
            }
            $new_collection->push([
                'id' => $sale_product->id,
                'category_type' => $sale_product->category_type,
                'category' => $sale_product->category,
                'brand' => $sale_product->brand,
                'model' => $sale_product->model,
                'color' => $sale_product->color,
                'quantity' => $sale_product->quantity,
                'image' => $sale_product->image,
                'price' => $price,
            ]);
        }
        
                    
        return view('front.categorytype.show', compact('dec_categorytype', 'unique_brand', 
        'unique_category', 'new_collection'));
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            return view('category_type.edit', compact('id'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        CategoryType::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect('/categorytypes');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            CategoryType::destroy($id);
            return redirect('/categorytypes');
        }
        else {
            return back();
        }
    }

    public function showData($category, $name) {

        $dec_categorytype = Crypt::decrypt($category);
        $dec_name = Crypt::decrypt($name);
        // var_dump($dec_categorytype);
        $new_collection = new Collection;
        $collection = new Collection;

        $unique_brand = new Collection;
        $unique_category = new Collection;
        $sale_products = SaleProduct::where('category_type', $dec_categorytype)->get();
        foreach($sale_products as $sale_product) {
            $collection->push([
                'brand' => $sale_product->brand,
                'category' => $sale_product->category,
            ]);
        }
        $unique_brand = $collection->unique('brand');
        $unique_category = $collection->unique('category');

        foreach($unique_brand as $u_brand) {
            if($dec_name == $u_brand['brand']) {
                $products = SaleProduct::where('category_type', $dec_categorytype)
                ->where('brand', $dec_name)->get();
            }
        }

        foreach($unique_category as $u_category) {
            if($dec_name == $u_category['category']) {
                $products = SaleProduct::where('category_type', $dec_categorytype)
                ->where('category', $dec_name)->get();
            }
        }

        foreach($products as $product) {
            if($dec_categorytype == 'Smartphone' || $dec_categorytype == 'Tablet') {
                $price = PhoneDetail::where('model', $product->model)
                ->where('color', $product->color)->value('price');
            }
            else {
                $price = FeaturedDetail::where('model', $product->model)
                ->where('color', $product->color)->value('price');
            }
            $new_collection->push([
                'id' => $product->id,
                'category_type' => $product->category_type,
                'category' => $product->category,
                'brand' => $product->brand,
                'model' => $product->model,
                'color' => $product->color,
                'quantity' => $product->quantity,
                'image' => $product->image,
                'price' => $price,
            ]);
        }

        return view('front.brand.show', compact('dec_categorytype', 'dec_name', 'unique_brand', 
         'unique_category', 'new_collection'));
    }

    public function showDataAsPrice($category, $price) {
        $dec_categorytype = Crypt::decrypt($category);
        $dec_price = Crypt::decrypt($price);
        $sale_products = SaleProduct::where('category_type', $dec_categorytype)->get();
        
        $e_value = explode(' to ', $dec_price);
        $min_price = $e_value[0];
        $max_price = $e_value[1];

        $collection = new Collection;
        $new_collection = new Collection;
        $unique_collection = new Collection;
        $unique_brand = new Collection;
        $unique_category = new Collection;
        $categorytype_lists = [];

        foreach($sale_products as $sale_product) {
            $unique_collection->push([
                'brand' => $sale_product->brand,
                'category' => $sale_product->category,
            ]);
        }

        $unique_brand = $unique_collection->unique('brand');
        $unique_category = $unique_collection->unique('category');

        foreach($sale_products as $sale_product) {
            if($dec_categorytype == 'Smartphone' || $dec_categorytype == 'Tablet') {
                $price = PhoneDetail::where('model', $sale_product->model)
                ->where('color', $sale_product->color)->value('price');
            }
            else {
                $price = FeaturedDetail::where('model', $sale_product->model)
                ->where('color', $sale_product->color)->value('price');
            }
            $collection->push([
                'id' => $sale_product->id,
                'category_type' => $sale_product->category_type,
                'category' => $sale_product->category,
                'brand' => $sale_product->brand,
                'model' => $sale_product->model,
                'color' => $sale_product->color,
                'quantity' => $sale_product->quantity,
                'image' => $sale_product->image,
                'price' => $price,
            ]);
        }
        foreach($collection as $col) {
            if($col['price'] >= $min_price && $col['price'] < $max_price) {
                $new_collection->push([
                    'id' => $col['id'],
                    'category_type' => $col['category_type'],
                    'category' => $col['category'],
                    'brand' => $col['brand'],
                    'model' => $col['model'],
                    'color' => $col['color'],
                    'quantity' => $col['quantity'],
                    'image' => $col['image'],
                    'price' => $col['price'],
                ]);
            }
        }

        if($dec_categorytype == 'Feature' || $dec_categorytype == 'Accessory') {
            foreach($sale_products as $sale_product) {
                array_push($categorytype_lists, $sale_product->category);
            }   
        }
        $categorytype_lists = array_unique($categorytype_lists);
        return view('front.price.show', compact('dec_categorytype', 'dec_price',
         'unique_brand', 'unique_category', 'new_collection', 'sale_products', 'categorytype_lists'));
    }

}
