<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Yajra\Datatables\Datatables;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('department.index', compact('departments'));
    }

    public function data(Request $request) {
        $model = new Collection;

        if($request->ajax()) {
            $datas = Department::all();
            foreach($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'name' => $value->name,
                ]);
            }

            return Datatables::of($model)
            ->addColumn('edit', function($model) {
                return view('department.partials.edit_btn', compact('model'))->render();
            })
            ->addColumn('delete', function($model) {
                return view('department.partials.delete_btn', compact('model'))->render();
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }

        return abort(404);
    }

    public function create()
    {
        //
        return view('department.create');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
        ]);
        Department::create([
            'name' => $request->name,
        ]);
        return redirect('departments');
    }

    public function show(Department $department)
    {
        //
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can('update-department')) {
            $department = Department::find($id);
            return view('department.edit', compact('department', 'id'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
        ]);
        Department::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect('departments');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can('update-department')) {
            Department::destroy($id);
            return redirect('departments');
        }
        else {
            return back();
        }
    }
}