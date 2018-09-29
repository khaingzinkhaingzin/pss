<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherCost extends Model
{
    //

    protected $fillable = [
    	'name', 'price', 'start_day', 'start_month_year', 'expire_day', 'expire_month_year',
    ];
}
