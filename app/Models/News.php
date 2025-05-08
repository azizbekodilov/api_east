<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use Translatable;

    protected $fillable = [
        'media', 'sort',
    ];

    public $timestamps = false;

    public $translatedAttributes = ['news_id','locale', 'title', 'short_text', 'info', 'text', 'slug', 'meta_title', 'meta_description'];

    public function newsTranslation()
    {
        return $this->hasMany(NewsTranslation::class);
    }

}
