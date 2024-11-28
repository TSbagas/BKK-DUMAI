<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'id',
        'avatar',
        'full_name',
        'post',
        'email',
        'city',
        'salary',
        'age',
        'experience',
        'status',
    ];

}
