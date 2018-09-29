<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneDetail extends Model
{
    //

    protected $fillable = [
        'brand', 'category', 'image', 'model', 'display', 'network', 
        'connection', 'front_camera', 'back_camera', 'android_version', 'color', 'storage', 'RAM', 'price' 
    ];

    public function category() {
    	return $this->belongsTo('App\Category');
    }

    public function brand() {
    	return $this->belongsTo('App\PhoneBrand');
    }

    public function model() {
    	return $this->belongsTo('App\PhoneModel');
    }

}
