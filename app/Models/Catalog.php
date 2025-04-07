<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{

    use Translatable;

    protected $fillable = [
        'media', 'sort', 'parent_id'
    ];

    public $translatedAttributes = ['catalog_id', 'title', 'text', 'short_text', 'meta_title', 'meta_description', 'locale'];


    public function catalogTanslation()
    {
        return $this->hasMany(CatalogTranslation::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function children_for_main()
    {
        return $this->hasMany(self::class, 'parent_id')->limit(2);
    }

}
