<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTranslation extends Model
{
    protected $fillable = [
        'employee_id','title', 'profession', 'text'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}
