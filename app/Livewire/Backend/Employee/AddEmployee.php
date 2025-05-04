<?php

namespace App\Livewire\Backend\Employee;

use App\Models\Employee;
use App\Models\EmployeeTranslation;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddEmployee extends Component
{

    use WithFileUploads;

    #[Rule('required')] public $media;
    #[Rule('required')] public $phone;
    #[Rule('required')] public $telegram;
    #[Rule('required')] public $sort;

        public $title;
        public $profession;
        public $text;
        public $locale;
        public $employee_id;

    public function mount()
    {
        app()->setLocale('ru');
        $this->locale = 'ru';
    }

    public function save()
    {
        try {
            $employee = Employee::create($this->validate());
            EmployeeTranslation::create(
                [
                    'title' => $this->title,
                    'employee_id' => $employee->id,
                    'text' => $this->text,
                    'locale' => $this->locale,
                    'profession' => $this->profession,
                ]
            );
            $this->redirect('/east/employee');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.backend.employee.add-employee')->extends('adminlte::page');
    }
}
