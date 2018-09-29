<?php

namespace App\Http\Controllers;

use App\EmployeeSalary;
use App\Employee;
use App\Salary;
use App\Absent;
use App\Department;
use App\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $month_years = EmployeeSalary::pluck('month_year')->unique();
        return view("employeesalary.index", compact('month_years'));
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $data = EmployeeSalary::all();
            foreach ($data as $value) {
                $model->push([
                    'id' => $value->employee_id,
                    'name' => $value->employee_name,
                    'department' => $value->department_id,
                    'status' => $value->status_id,
                    'salary' => $value->salary,
                    'month_year' => $value->month_year,
                ]);
            }
            return Datatables::of($model)
            ->editColumn('department', function($model) {
                $department = Department::where('id', $model['department'])
                ->value('name');
                return $department;
            })
            ->editColumn('status', function($model) {
                $status = Status::where('id', $model['status'])
                ->value('name');
                return $status;
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }   
        return abort(404);     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "hello";
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
        $date = Carbon::now();
        $month = Carbon::parse($date)->format('F');
        $year = Carbon::parse($date)->format('Y');
        $m_y = $month . " " . $year;
        $employees = Employee::all();
        Absent::where('month_year', $m_y)->get();

        $absents = \DB::table('absents')
        ->select('employee_id', \DB::raw('count(*) as count'))
        ->groupBy('employee_id')
        ->get();
        // var_dump($absents);

        foreach($employees as $employee) {
            $absent_count = 0;
            $daily_salary = 0;
            $salary = 0;
            $lost_salary = 0;
            $monthly_salary = Salary::where('department_id', $employee->department_id)
            ->where('status_id', $employee->status_id)->value('salary');
            foreach($absents as $absent) {
                if($employee->id == $absent->employee_id) {
                    $absent_count = $absent->count;
                }
            }
            if($month == 'September' || $month == 'April' || $month == 'June'
            || $month == 'November') {
                $daily_salary = round($monthly_salary / 30);
            }
            elseif($month == 'February') {
                $daily_salary = round($monthly_salary / 28);
            }
            else {
                $daily_salary = round($monthly_salary / 31);
            }
            $lost_salary = $daily_salary * $absent_count;
            $salary = $monthly_salary - $lost_salary;

            EmployeeSalary::create([
                'employee_id' => $employee->id,
                'employee_name' => $employee->name,
                'department_id' => $employee->department_id,
                'status_id' => $employee->status_id,
                'salary' => $salary,
                'month_year' => $m_y,
            ]);
        }
        return redirect('/employee_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeSalary  $employeeSalary
     * @return \Illuminate\Http\Response
     */
    public function show($my)
    {
        //
        $collection = new Collection;
        $salaries = EmployeeSalary::where('month_year', $my)->get();
        foreach($salaries as $salary) {
            $emp_name = Employee::where('id', $salary->employee_id)->value('name');
            $dep_name = Department::where('id', $salary->department_id)->value('name');
            $status_name = Status::where('id', $salary->status_id)->value('name');
            $collection->push([
                'emp_id' => $salary->employee_id,
                'emp_name' => $emp_name,
                'department' => $dep_name,
                'status' => $status_name,
                'salary' => $salary->salary,
                'month_year' => $salary->month_year,
            ]);
        }
        return response()->json($collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeSalary  $employeeSalary
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeSalary $employeeSalary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeSalary  $employeeSalary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeSalary $employeeSalary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeSalary  $employeeSalary
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeSalary $employeeSalary)
    {
        //
    }
}
