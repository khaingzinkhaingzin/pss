<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        "name", "image", "nrc", "account_no", "department_id", "status_id", "gender", "dob", "email",
        "phone_no", "address", "start_date"
    ];
}
