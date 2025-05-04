<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{

    use Translatable;

    public $translatedAttributes = ['title', 'page_id', 'locale', 'text', 'slug', 'meta_title', 'meta_description'];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

}
