<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];
}
