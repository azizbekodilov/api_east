<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{

    use Translatable;

    public $translatedAttributes = ['title', 'text', 'slug', 'meta_title', 'meta_description'];
}
