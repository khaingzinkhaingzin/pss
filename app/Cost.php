<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    //
    protected $fillable = [
    	'category_type', 'category', 'brand', 'model', 'color', 'quantity', 'price', 'cost', 'sale_or_service', 'day', 'month_year', 'image'
    ];
}
