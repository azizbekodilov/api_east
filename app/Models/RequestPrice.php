<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestPrice extends Model
{
    protected $fillable = [
        'phone',
        'ip'
    ];
}
