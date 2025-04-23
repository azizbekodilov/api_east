<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallRequests extends Model
{
    protected $fillable = [
        'name', 'phone', 'mail', 'notes'
    ];
}
