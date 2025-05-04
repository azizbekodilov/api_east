<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Card;

class Product extends Model
{
    use Translatable;
    protected $fillable = [
        'media', 'catalog_id', 'partner_id', 'price', 'update_product_id', 'balance', 'thickness', 'width', 'length', 'height', 'dimensions', 'medium_tonnage', 'mark', 'status', 'is_discount', 'is_main_page', 'last_update_at', 'sort',
    ];

    protected $translatedAttributes = [
        'product_id', 'title', 'text', 'short_text', 'meta_title', 'meta_description', 'locale'
    ];

    public function productTranslations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

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

    public function order($related, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null, $relation = null)
    {
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id');
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}
