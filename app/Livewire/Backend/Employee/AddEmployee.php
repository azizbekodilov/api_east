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

    public function translit($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        return $s; // возвращаем результат
      }

    public function save()
    {
        try {
            $validate = $this->validate();
            $path = $this->media->store(
                'employees/'.$this->translit($this->title).$this->media->extension()
            );
            $validate['media'] = $path;
            $employee = Employee::create($validate);
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
