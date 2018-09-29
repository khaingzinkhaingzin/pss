<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    //
    protected $fillable = ['employee_id', 'day', 'month_year'];
}
