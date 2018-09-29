<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = [
        'permissions'
    ];

    protected $casts = [
        'permissions' => 'array',
    ];
}
