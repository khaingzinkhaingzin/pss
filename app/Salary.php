<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    protected $fillable = ['department_id', 'status_id', 'salary'];
}
