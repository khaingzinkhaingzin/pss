<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedDetail extends Model
{
    //
    protected $fillable = ['category', 'brand', 'model', 'image', 'color', 'price'];
}
