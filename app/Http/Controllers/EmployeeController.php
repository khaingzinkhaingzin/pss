<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use App\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    public function index()
    {
        //
        return view('employee.index');
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $data = Employee::all();
            foreach($data as $value) {
                $model->push([
                    'id' => $value->id,
                    'image' => $value->image,
                    'name' => $value->name,
                    'nrc' => $value->nrc,
                    'account_no' => $value->account_no,
                    'department' => $value->department_id,
                    'status' => $value->status_id,
                    'gender' => $value->gender,
                    'dob' => $value->dob,
                    'email' => $value->email,
                    'phone_no' => $value->phone_no,
                    'address' => $value->address,
                    'start_date' => $value->start_date,
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
                ->editColumn('gender', function($model) {
                    if($model['gender'] == 0) {
                        $data = 'male';
                    }
                    else {
                        $data = 'female';
                    }
                    return $data;
                })
                ->editColumn("image", function($model) {
                    $data = "<img src='../../storage/images/".$model['image']."' alt='' width='70' height='70' id='img' class='img-circle'>";
                    return $data;
                })
                ->addColumn("edit", function($model) {
                    return view('employee.partials.edit_btn', compact('model'));
                })
                ->addColumn("delete", function($model) {
                    return view('employee.partials.delete_btn', compact('model'));
                })
                ->addColumn("absent", function($model) {
                    return view('employee.partials.absent_btn', compact('model'));
                })
                ->rawColumns(['image', 'edit', 'delete', 'absent'])
                ->make(true);
            }
        return abort(404);
    }

    public function create()
    {
        //
            $departments = Department::pluck('name', 'id');
            $status = status::pluck('name', 'id');
            return view('employee.create', compact('departments', 'status'));
        
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'file' => 'required', 
            'name' => 'required',
            'nrc' => 'required',
            'account_no' => 'required',
            'department' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'start_date' => 'required',
        ]);

        $file = $request->file('file');
        $filename = uniqid() . '_' .$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $filename);
        Employee::create([
            'image' => $filename,
            'name' => $request->name,
            'nrc' => $request->nrc,
            'account_no' => $request->account_no,
            'department_id' => $request->department,
            'status_id' => $request->status,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'start_date' => $request->start_date,
        ]);

        return redirect('employees');
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit($id)
    {
        //
            $departments = Department::pluck('name', 'id');
            $status = Status::pluck('name', 'id');
            return view('employee.edit', compact('departments', 'status', 'id'));

    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'file' => 'required', 
            'name' => 'required',
            'nrc' => 'required',
            'account_no' => 'required',
            'department' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'start_date' => 'required',
        ]);
        
        $file = $request->file('file');
        $filename = uniqid() . '_' .$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $filename);
        Employee::where('id', $id)->update([
            'image' => $filename,
            'name' => $request->name,
            'nrc' => $request->nrc,
            'account_no' => $request->account_no,
            'department_id' => $request->department,
            'status_id' => $request->status,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'start_date' => $request->start_date,
        ]);

        return redirect('employees');
    }

    public function destroy($id)
    {
        //
            Employee::destroy($id);
            return redirect('employees');
    }

    public function showEmpList() {
        return view("employee.employee_list");
    }
}