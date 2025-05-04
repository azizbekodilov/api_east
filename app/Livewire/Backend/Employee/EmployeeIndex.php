<?php

namespace App\Livewire\Backend\Employee;

use App\Models\Employee;
use Livewire\Component;

class EmployeeIndex extends Component
{
    public function render()
    {
        $collection = Employee::get();
        return view('livewire.backend.employee.employee-index', compact('collection'))->extends('adminlte::page');
    }
}
