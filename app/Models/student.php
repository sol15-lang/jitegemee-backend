<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'location',
        'school_id'
    ] ;
}
