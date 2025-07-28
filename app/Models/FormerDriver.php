<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormerDriver extends Model
{
    protected $fillable = [
        'name',
        'email',
        'salary',
        'hired_at',
        'fired_at',
    ];

    protected $dates = ['hired_at', 'fired_at'];
}
