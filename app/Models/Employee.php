<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use Translatable;

    protected $fillable = [
        'media', 'phone', 'telegram'
    ];

    public $timestamps = false;

    public $translatedAttributes = ['employee_id','title', 'profession', 'text'];

    public function employeeTranslation()
    {
        return $this->hasMany(EmployeeTranslation::class);
    }
}
