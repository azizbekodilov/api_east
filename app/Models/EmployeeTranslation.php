<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTranslation extends Model
{
    protected $fillable = [
        'employee', 'title', 'text', 'short_text', 'meta_title', 'meta_description', 'locale'
    ];
}
