<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    //
    protected $fillable = [
    	'category_type', 'category', 'brand', 'model', 'color', 'quantity', 'price', 'image',
    ];
}
