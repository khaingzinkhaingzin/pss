<?php

namespace App\Http\Controllers;

use App\PhoneBrand;
use App\ServiceModel;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

use Illuminate\Support\Str;

class ServiceModelController extends Controller
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
            return view('servicemodel.index');
        }
    }

    public function data(Request $request) {
        $model = new Collection;

        if($request->ajax()) {
            $datas = ServiceModel::all();
            foreach($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'brand' => $value->brand_id,
                    'name' => $value->name,
                ]);
            }

            return Datatables::of($model)
            ->editColumn('brand', function($model) {
                return PhoneBrand::where('id', $model['brand'])->value('name');
            })
            ->addColumn('edit', function($model) {
                return view('servicemodel.partials.edit_btn', compact('model'))->render();
            })
            ->addColumn('delete', function($model) {
                return view('servicemodel.partials.delete_btn', compact('model'))->render();
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }

        return abort(404);
    }

    public function create()
    {
        //
        $phonebrands = PhoneBrand::pluck('name', 'id');
        return view('servicemodel.create', compact('phonebrands'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'phonebrand' => 'required',
            'name' => 'required',
        ]);
        $servicemodels = ServiceModel::all();
        if(count($servicemodels) == 0) {
            ServiceModel::create([
                'brand_id' => $request->phonebrand,
                'name' => $request->name,
            ]);
        }

        else {
            $already = null;
            foreach ($servicemodels as $servicemodel) {
                $brandid = $servicemodel->brand_id;
                $b_id = $request->phonebrand;
                $model = Str::lower($servicemodel->name);
                $r_model = Str::lower($request->name);
                if($brandid == $b_id && $model == $r_model) {
                    $already = 'yes';
                }
            }

            if($already == null) {
                ServiceModel::create([
                    'brand_id' => $request->phonebrand,
                    'name' => $request->name,
                ]);
            }
        }
        return redirect('servicemodels');
    }

    public function show(ServiceModel $serviceModel)
    {
        //
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can("update-servicemodel")) {
            $phonebrands = PhoneBrand::pluck('name', 'id');
            return view('servicemodel.edit', compact('id', 'phonebrands'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //
        \DB::table('service_models')->where('id', $id)->update([
            'brand_id' => $request->phonebrand,
            'name' => $request->name,
        ]);
        return redirect('servicemodels');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can("update-servicemodel")) {
            ServiceModel::destroy($id);
            return redirect('servicemodels');
        }
        else {
            return back();
        }
    }
}
