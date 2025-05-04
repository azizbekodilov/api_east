<?php

namespace App\Livewire\Backend\Employee;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditEmployee extends Component
{

    public $employee;

    #[Rule('required')] public $media;
    #[Rule('required')] public $phone;
    #[Rule('required')] public $telegram;
    #[Rule('required')] public $sort;

    public $title;
    public $profession;
    public $text;
    public $locale;
    public $employee_id;

    public $translatable;

    public function mount($id)
    {
        app()->setLocale('ru');
        $this->locale = 'ru';
        $this->employee = Employee::find($id);
        $this->sort = $this->employee->sort;
        $this->phone = $this->employee->phone;
        $this->telegram = $this->employee->telegram;
        $this->media = $this->employee->media;
        $this->translatable = $this->employee->employeeTranslation->where('locale', $this->locale)->first();
        $this->title = $this->translatable->title;
        $this->profession = $this->translatable->profession;
        $this->text = $this->translatable->text;
    }

    public function save()
    {
        $this->employee->update($this->validate());
        $this->translatable->title = $this->title;
        $this->translatable->text = $this->text;
        $this->translatable->profession = $this->profession;
        $this->translatable->save();
        $this->redirect('/east/employee');
    }

    public function render()
    {
        return view('livewire.backend.employee.edit-employee')->extends('adminlte::page');
    }
}
