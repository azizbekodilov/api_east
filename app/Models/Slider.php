<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends TranslatableModel
{
    use HasFactory;

    protected $translationModel = SliderTranslation::class;
    protected $translationAttributes = ['name'];
    protected $translationForeignKey = 'book_id';
}

class Slider extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'media', 'status',
    ];

    public $timestamps = false;

    public $translatedAttributes = ['slider_id','locale', 'title', 'info', 'sort'];


    public function sliderTranslation()
    {
        return $this->hasMany(SliderTranslation::class);
    }
}
