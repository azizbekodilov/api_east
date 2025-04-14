<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    protected $fillable = [
        'news_id', 'title', 'text', 'short_text', 'meta_title', 'meta_description', 'locale', 'slug',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }


}
