<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'media', 'parent_id', 'sort', 'title', 'text'
    ];
}
