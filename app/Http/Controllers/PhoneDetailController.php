<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Crypt;


use App\PhoneDetail;
use App\Category;
use App\PhoneBrand;
use App\PhoneModel;
use App\SaleProduct;
use App\FeaturedDetail;


class PhoneDetailController extends Controller
{

    public function __construct() {

    }

    public function index()
    {
        return view('phonedetail.index');
    }

    public function data(Request $request) {
        if($request->ajax()) {
            $model = PhoneDetail::query();
            return Datatables::of($model)
                ->addColumn("image", function($model) {
                    $data = "<img src='../../storage/images/".$model->image."' alt='' width='100' height='100'>";
                    return $data;
                })
                ->addColumn("edit", function($model) {
                    if(\Auth::user()->is_admin == 1) {
                        $data = "<a href='phonedetails/" . $model->id . "/edit' class='btn btn-success btn-sm'>
                        <i class='fa fa-edit'></i></a>";
                        return $data;
                    }
                })
                ->addColumn("delete", function($model) {
                    if(\Auth::user()->is_admin == 1) {
                        $data = '<form action="' . route('phonedetails.destroy', $model->id). '" method="post">'
                                    . csrf_field() .
                                    method_field("delete") .
                                    '<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>';
                        return $data;
                    }
                })
                ->rawColumns(['image', 'edit', 'delete'])
                ->toJson();
        }
        return abort(404);
        
    }

    public function create()
    {
        //
        $categories = SaleProduct::pluck('category', 'category');
        $models = SaleProduct::pluck('model', 'model');
        $phonebrands = SaleProduct::pluck('brand', 'brand');
        // $models = PhoneModel::where('brand_id->name')->pluck('name', 'id');
        return view('phonedetail.create', compact('phonebrands', 'categories', 'models'));

    }

    public function store(Request $request)
    {
        //validate datas
        $this->validate($request, [
            'file' => 'required',
            'phonebrand' => 'required',
            'category' => 'required',            
            'model_no' => 'required',            
            'display' => 'required',            
            'network' => 'required',            
            'connection' => 'required',           
            'front_camera' => 'required',            
            'back_camera' => 'required',           
            'android_version' => 'required',            
            'color' => 'required',            
            'storage' => 'required',            
            'ram' => 'required',            
            'price' => 'required'            

        ]);

        $file = $request->file('file');
        $filename = uniqid().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $filename);
        
        PhoneDetail::create([
            'brand' => $request->phonebrand,
            'category' => $request->category,
            'image' => $filename,
            'model' => $request->model_no,
            'display' => $request->display,
            'network' => $request->network,
            'connection' => $request->connection,
            'front_camera' => $request->front_camera,
            'back_camera' => $request->back_camera,
            'android_version' => $request->android_version,
            'color' => $request->color,
            'storage' => $request->storage,
            'RAM' => $request->ram,
            'price' => $request->price,
        ]);

        return redirect('phonedetails');
        
    }

    public function show($id)
    {
        //
        $product = SaleProduct::find($id);
        $category_type = $product->category_type;
        $brand = $product->brand;
        $model = $product->model;
        $color = $product->color;
        if($category_type == 'Smartphone' || $category_type == 'Tablet') {
            $detail = PhoneDetail::where('brand', $brand)
            ->where('model', $model)->where('color', $color)->first();
            $colors = SaleProduct::where('model', $model)->paginate(3);
        }
        else {
            $detail = FeaturedDetail::where('model', $model)->where('color', $color)->first();
            $colors = SaleProduct::where('model', $model)->paginate(3);
        }

        $related_products = new Collection;
        $r_products = SaleProduct::where('category_type', $category_type)->where('brand', $brand)->get();
        foreach($r_products as $r_product) {
            $related_products->push([
                'brand' => $r_product->brand,
                'model' => $r_product->model,
                'color' => $r_product->color,
                'image' => $r_product->image,
            ]);
        }
        $real_related_products = $related_products->unique('model');
        return view('detail', compact('category_type', 'detail', 'real_related_products', 'colors'));
    }

    public function edit($id)
    {
        if(\Auth::user()->is_admin == 1) {
            $categories = SaleProduct::pluck('category', 'category');
            $models = SaleProduct::pluck('model', 'model');
            $phonebrands = SaleProduct::pluck('brand', 'brand');
            return view('phonedetail.edit', compact('id', 'phonebrands', 'categories', 'models'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //validate datas
        $this->validate($request, [
            'file' => 'required',
            'phonebrand' => 'required',
            'category' => 'required',            
            'model_no' => 'required',            
            'display' => 'required',            
            'network' => 'required',            
            'connection' => 'required',           
            'front_camera' => 'required',            
            'back_camera' => 'required',           
            'android_version' => 'required',            
            'color' => 'required',            
            'storage' => 'required',            
            'ram' => 'required',            
            'price' => 'required'            

        ]);
        
        $file = $request->file('file');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $filename);
        \DB::table('phone_details')->where('id', $id)->update([
            'brand' => $request->phonebrand,
            'category' => $request->category,
            'image' => $filename,
            'model' => $request->model_no,
            'display' => $request->display,
            'network' => $request->network,
            'connection' => $request->connection,
            'front_camera' => $request->front_camera,
            'back_camera' => $request->back_camera,
            'android_version' => $request->android_version,
            'color' => $request->color,
            'storage' => $request->storage,
            'RAM' => $request->ram,
            'price' => $request->price,
        ]);
        return redirect('phonedetails');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            PhoneDetail::destroy($id);
            return redirect('phonedetails');
        }
        else {
            return back();
        }
    }

    public function getPhoneBrands($brand) {
        $model = \DB::table('sale_products')->where('brand', $brand)->pluck('model', 'model');
        return response()->json($model);
    }
    
}