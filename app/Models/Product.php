<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Translatable;

    protected $fillable = [
        'media', 'catalog_id', 'partner_id', 'update_product_id', 'balance', 'medium_tonnage', 'status', 'is_discount', 'is_main_page', 'last_update_at', 'sort',
    ];

    protected $translatedAttributes = [
        'product_id', 'title', 'text', 'short_text', 'meta_title', 'meta_description', 'locale'
    ];

    public function productAttribute()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes', 'product_id', 'attribute_id')->withPivot('value', 'sort');
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }

    public function withAttributeName()
    {
        $data = [];
        foreach ($this->attribute as $key => $value) {
            $data[] = $value;
        }

        return $data;
    }

}
