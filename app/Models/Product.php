<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'media', 'catalog_id', 'partner_id', 'update_product_id', 'balance', 'medium_tonnage', 'status', 'is_discount', 'is_main_page', 'last_update_at', 'sort',
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
