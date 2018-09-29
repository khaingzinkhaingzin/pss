<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

use App\FeaturedDetail;
use App\Category;
use App\PhoneModel;
use App\PhoneBrand;

class FeaturedDetailController extends Controller
{

    public function index()
    {
        //
        return view('featured_detail.index');
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $data = FeaturedDetail::all();
            foreach($data as $value) {
                $model->push([
                    'id' => $value->id,
                    'category' => $value->category,
                    'brand' => $value->brand,
                    'model' => $value->model,
                    'color' => $value->color,
                    'price' => $value->price,
                    'image' => $value->image,
                ]);
            }
            return Datatables::of($model)
            ->addColumn("image", function($model) {
                    $data = "<img src='../../storage/images/".$model['image']."' alt='' width='100' height='100'>";
                    return $data;
                })
            ->addColumn('edit', function($model)     {
                return view('featured_detail.partials.edit_btn', compact('model'));
            })
            ->addColumn('delete', function($model)     {
                return view('featured_detail.partials.delete_btn', compact('model'));
            })
            ->rawColumns(['image', 'edit', 'delete'])
            ->make(true);
        }
        return abort(404);
    }

    public function create()
    {
        //
        $categories = Category::pluck('name');
        $models = PhoneModel::pluck('name');
        $phonebrands = PhoneBrand::pluck('name');
        return view('featured_detail.create', compact('categories', 'models', 'phonebrands'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'category' => 'required',            
            'phonebrand' => 'required',
            'model_no' => 'required',                    
            'color' => 'required',            
            'price' => 'required',           

        ]);

        $file = $request->file('file');
        $filename = uniqid().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $filename);
        
        $features = FeaturedDetail::all();

        if(count($features) == 0) {
            FeaturedDetail::create([
                'category' => $request->category,
                'brand' => $request->phonebrand,
                'image' => $filename,
                'model' => $request->model_no,
                'color' => $request->color,
                'price' => $request->price,
            ]);
        }
        else {
            $already = null;
            foreach($features as $feature) {
                if($feature->model == $request->model && $feature->color == $request->color) {
                    $already = 'yes';       
                }
            }
            if($already == null) {
                FeaturedDetail::create([
                    'category' => $request->category,
                    'brand' => $request->phonebrand,
                    'image' => $filename,
                    'model' => $request->model_no,
                    'color' => $request->color,
                    'price' => $request->price,
                ]);
            }
        }

        return redirect('/featuredetails');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            $categories = Category::pluck('name');
            $models = PhoneModel::pluck('name');
            $phonebrands = PhoneBrand::pluck('name');
            return view('featured_detail.edit', compact('id', 'categories', 'models',
        'phonebrands'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'file' => 'required',
            'category' => 'required',            
            'phonebrand' => 'required',
            'model_no' => 'required',                    
            'color' => 'required',            
            'price' => 'required',           

        ]);

        $file = $request->file('file');
        $filename = uniqid().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $filename);
        
        FeaturedDetail::where('id', $id)->update([
            'category' => $request->category,
            'brand' => $request->phonebrand,
            'image' => $filename,
            'model' => $request->model_no,
            'color' => $request->color,
            'price' => $request->price,
        ]);

        return redirect('featuredetails');

    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            FeaturedDetail::destroy($id);
            return redirect('featuredetails');
        }
        else {
            return back();
        }
    }
}
