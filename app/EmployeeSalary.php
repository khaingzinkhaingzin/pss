<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    //
    protected $fillable = ['employee_id', 'employee_name', 'department_id',
'status_id', 'salary', 'month_year'];
}
