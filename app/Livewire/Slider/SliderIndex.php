<?php

namespace App\Livewire\Slider;

use App\Models\Slider;
use Livewire\Component;

class SliderIndex extends Component
{

    public function mount()
    {
        app()->setLocale('ru');
    }

    public function render()
    {
        $collection = Slider::get();
        return view('livewire.slider.slider-index', compact('collection'))->extends('adminlte::page');
    }
}
