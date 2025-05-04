<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'text', 'meta_title', 'meta_description', 'slug'];

    public function pageTranslation()
    {
        return $this->hasMany(PageTranslation::class);
    }

}
