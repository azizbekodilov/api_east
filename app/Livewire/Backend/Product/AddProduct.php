<?php

namespace App\Livewire\Backend\Product;

use Livewire\Component;

class AddProduct extends Component
{

    public function mount()
    {
        app()->setLocale('ru');
    }

    public function render()
    {
        return view('livewire.backend.product.add-product')->extends('adminlte::page');
    }
}
