<?php

namespace App\Http\Controllers;

use App\Salary;
use App\Department;
use App\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class SalaryController extends Controller
{
    
    public function index()
    {
        //
        return view('salary.index');
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $data = Salary::all();
            foreach($data as $value) {
                $model->push([
                    'id' => $value->id,
                    'department' => $value->department_id,
                    'status' => $value->status_id,
                    'salary' => $value->salary,
                ]);
            }
            return Datatables::of($model)
                ->editColumn("department", function($model) {
                    $department = Department::where('id', $model['department'])->first();
                    return $department->name;
                })
                ->editColumn("status", function($model) {
                    $status = Status::where('id', $model['status'])->first();
                    return $status->name;
                })
                ->addColumn("edit", function($model) {
                    return view('salary.partials.edit_btn', compact('model'));
                })
                ->addColumn("delete", function($model) {
                    return view('salary.partials.delete_btn', compact('model'));
                })
                ->rawColumns(['image', 'edit', 'delete'])
                ->toJson();
        }
        return abort(404);
        
    }

    public function create()
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can("update-dalary")) {
            $departments = Department::pluck('name', 'id');
            $status = Status::pluck('name', 'id');
            return view('salary.create', compact('departments', 'status'));
        }
        else {
            return  back();
        }
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'department' => 'required', 
            'status' => 'required',
            'salary' => 'required',
        ]);

        Salary::create([
            'department_id' => $request->department,
            'status_id' => $request->status,
            'salary' => $request->salary,
        ]);

        return redirect('salaries');
    }

    public function show(Salary $salary)
    {
        //
    }

    public function edit($id)
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can("update-salary")) {
            $departments = Department::pluck('name', 'id');
            $status = Status::pluck('name', 'id');
            return view('salary.edit', compact('departments','status', 'id'));
        }
        else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'department' => 'required', 
            'status' => 'required',
            'salary' => 'required',
        ]);

        Salary::where('id', $id)->update([
            'department_id' => $request->department,
            'status_id' => $request->status,
            'salary' => $request->salary,
        ]);

        return redirect('salaries');
    }

    public function destroy($id)
    {
        //
        if(\Auth::user()->is_admin == 1 || \Auth::user()->can("delete-salary")) {
            Salary::destroy($id);

            return redirect('salaries');
        }
        else {
            return back();
        }
    }
}