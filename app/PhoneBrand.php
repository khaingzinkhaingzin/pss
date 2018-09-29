<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhoneModel;

class PhoneBrand extends Model
{
    //
    protected $fillable = ['name'];
    
    public function models() {
    	return $this->hasMany(PhoneModel::class);
    }
    
}