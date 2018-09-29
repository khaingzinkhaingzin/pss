<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Yajra\Datatables\Datatables;

use DB;
use App\Category;
use App\PhoneBrand;
use App\PhoneModel;


class PhoneBrandController extends Controller
{
    public function index()
    {
        //
        $phonebrands = PhoneBrand::all();
        return view('phonebrand.index', compact('phonebrands'));
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $datas = PhoneBrand::all();
            foreach ($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'name' => $value->name,
                ]);
            }
            return Datatables::of($model)
            ->addColumn('edit', function($model) {
                return view('phonebrand.partials.edit_btn', compact('model'));
            })
            ->addColumn('delete', function($model) {
                return view('phonebrand.partials.delete_btn', compact('model'));
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }   
        return abort(404);     
    }

    public function create()
    {
        //
        return view('phonebrand.create');
    }

    public function store(Request $request)
    {

        //validate datas

        $this->validate($request, [
            'brand' => 'required'
        ]);

        $brands = PhoneBrand::all();

        if(count($brands) == 0) {
            PhoneBrand::create([
                'name' => $request->brand,
            ]);
        }

        else {
            $already = null;
            foreach ($brands as $brand) {
                $phonebrand = Str::lower($brand->name);
                $r_brand = Str::lower($request->brand);
                if($phonebrand == $r_brand) {
                    $already = 'yes';
                }
            }

            if($already == null) {
                PhoneBrand::create([
                    'name' => $request->brand,
                ]);       
            }
        }
        
        return redirect('phonebrands');
    }

    public function show(PhoneBrand $phoneBrand)
    {
        //
    }

    public function edit($id)
    {
        if(\Auth::user()->is_admin == 1) {
            return view('phonebrand.edit', compact('id'));
        }
    }

    public function update(Request $request, $id)
    {
    //
        $this->validate($request, [
            'brand' => 'required',
        ]);
        DB::table('phone_brands')->where('id', $id)->update(
            [
                'name' => $request->brand,
            ]
        );

        return redirect('phonebrands');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1) {
            PhoneBrand::destroy($id);
            return redirect('phonebrands');
        }

    }
}
