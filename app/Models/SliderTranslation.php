<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['slider_id','locale', 'title', 'info', 'sort'];

    public function slider()
    {
        return $this->belongsTo(Slider::class, 'slider_id');
    }

}
