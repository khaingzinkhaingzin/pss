<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProduct extends Model
{
    //
    protected $fillable = [
    	'category', 'brand', 'model', 'color', 'quantity'
    ];
}
