<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhoneBrand;

class PhoneModel extends Model
{
    //
    protected $fillable = [
		'category_id', 'brand_id', 'name'
    ];

    public function brand() {
    	return $this->belongsTo(PhoneBrand::class);
    }
}