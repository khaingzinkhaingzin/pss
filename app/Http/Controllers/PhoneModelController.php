<?php

namespace App\Http\Controllers;

use App\PhoneModel;
use App\PhoneBrand;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Yajra\Datatables\Datatables;

class PhoneModelController extends Controller
{
    
    public function index()
    {
        return view('phonemodel.index', compact('phonebrands'));
    }

    public function data(Request $request) {
        $model = new Collection;

        if($request->ajax()) {
            $datas = PhoneModel::all();
            foreach($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'category_id' => $value->category_id,
                    'brand_id' => $value->brand_id,
                    'name' => $value->name,
                ]);
            }

            return Datatables::of($model)
            ->editColumn('category_id', function($model) {
                return Category::where('id', $model['category_id'])->value('name');
            })
            ->editColumn('brand_id', function($model) {
                return PhoneBrand::where('id', $model['brand_id'])->value('name');
            })
            ->addColumn('edit', function($model) {
                return view('phonemodel.partials.edit_btn', compact('model'))->render();
            })
            ->addColumn('delete', function($model) {
                return view('phonemodel.partials.delete_btn', compact('model'))->render();
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }

        return abort(404);
    }

    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');
        $brands = PhoneBrand::pluck('name', 'id');
        return view('phonemodel.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        //validate datas
        $this->validate($request, [
            'category' => 'required',
            'brand' => 'required',
            'name' => 'required',
        ]);

        //store datas
        PhoneModel::create([
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'name' => $request->name,
        ]);
        return redirect('phonemodels');
    }

    public function show(PhoneModel $phoneModel)
    {
        //
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            $m = PhoneModel::find($id);
            $categories = Category::pluck('name', 'id');
            $brands = PhoneBrand::pluck('name', 'id');
            $model = $m->name;
            return view('phonemodel.edit', compact('id', 'categories', 'brands', 'model'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //validate datas
        $this->validate($request, [
            'category' => 'required',
            'brand' => 'required',
            'name' => 'required',
        ]);
        
        \DB::table('phone_models')->where('id', $id)->update([
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'name' => $request->name,
        ]);

        return redirect('phonemodels');

    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            PhoneModel::destroy($id);
            return redirect('phonemodels');
        }
        else {
            return back();
        }
    }
}
