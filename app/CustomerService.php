<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    //

    protected $fillable = [
    	'name', 'brand_id', 'model_id', 'error', 'accessory_name', 'accessory_model_no', 'day', 'month_year', 'phone_no', 'price',
    ];

    protected $casts = ['accessory_name' => 'array', 'accessory_model_no' => 'array'];

    public function brand() {
    	return $this->belongsTo('App\PhoneBrand');
    }

    public function model() {
    	return $this->belongsTo('App\ServiceModel');
    }
}
