<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{

    protected $fillable = ['attribute_id', 'title', 'short_name', 'locale'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
