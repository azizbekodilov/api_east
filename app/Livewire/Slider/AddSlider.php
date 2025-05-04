<?php

namespace App\Livewire\Slider;

use App\Models\Slider;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSlider extends Component
{

    use WithFileUploads;

    #[Rule('required')] public $media;

    public $title;
    public $info;
    public $locale;

    public function mount()
    {
        app()->setLocale('ru');
        $this->locale = 'ru';
    }

    public function save()
    {
        try {
            $slider = Slider::create($this->validate());
            Slider::create(
                [
                    'title' => $this->title,
                    'slider_id' => $slider->id,
                    'locale' => $this->locale,
                    'info' => $this->info,
                ]
            );
            $this->redirect('/east/sliders');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.slider.add-slider')->extends('adminlte::page');
    }
}
