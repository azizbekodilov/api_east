<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogTranslation extends Model
{
    protected $fillable = [
        'catalog_id', 'title', 'text', 'short_text', 'meta_title', 'meta_description', 'locale'
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id')
    }

}
