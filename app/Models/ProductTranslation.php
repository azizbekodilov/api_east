<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{

    protected $fillable = [
        'product_id', 'title', 'text', 'short_text', 'meta_title', 'meta_description', 'locale'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
