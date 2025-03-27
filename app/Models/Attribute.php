<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;

    public function attributeTranslation()
    {
        return $this->hasMany(AttributeTranslation::class);
    }

}
