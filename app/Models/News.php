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

    public $translatedAttributes = ['news_id','locale', 'title', 'info', 'text', 'slug'];

    public function newsTranslation()
    {
        return $this->hasMany(NewsTranslation::class);
    }

}
