<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Steel extends Model
{
    use Translatable;

    protected $fillable = [
        'media'
    ];

    protected $translatedAttributes = ['title', 'text', 'meta_title', 'meta_description'];

}
