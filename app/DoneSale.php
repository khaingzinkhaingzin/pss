<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoneSale extends Model
{
    //
    protected $fillable = ['name', 'email', 'category_type', 'category', 'brand', 'model', 'color', 
    'quantity', 'price', 'image', 'day', 'month_year'];
}
