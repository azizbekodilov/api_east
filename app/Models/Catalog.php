<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{

    use Translatable;

    protected $fillable = [
        'media', 'sort', 'parent_id', 'is_main'
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
        return $this->hasMany(self::class, 'parent_id')->take(2);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
