<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallRequests extends Model
{

    protected $table = 'call_requests';

    protected $fillable = [
        'name', 'phone', 'mail', 'notes'
    ];
}
