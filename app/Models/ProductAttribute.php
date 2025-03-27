<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{

    public $timestamps = false;

    protected $fillable = ['product_id', 'attribute_id', 'value', 'sort'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
