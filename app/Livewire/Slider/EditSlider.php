<?php

namespace App\Livewire\Slider;

use App\Models\Slider;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditSlider extends Component
{
    public $slider;
    public $translatable;

    #[Rule('nullable')] public $media;

    public $title;
    public $locale;
    public $info;
    public $status;

    public function mount($id)
    {
        app()->setLocale('ru');
        $this->locale = 'ru';
        $this->slider = Slider::find($id);
        $this->translatable = $this->news->sliderTranslation->where('locale', $this->locale)->first();
        $this->title = $this->translatable->title;
        $this->info = $this->translatable->info;
    }

    public function save()
    {
        $this->sliderTranslation->update($this->validate());
        $this->translatable->title = $this->title;
        $this->translatable->info = $this->info;
        $this->translatable->save();
        $this->redirect('/east/sliders');
    }

    public function render()
    {
        return view('livewire.slider.edit-slider')->extends('adminlte::page');
    }
}
