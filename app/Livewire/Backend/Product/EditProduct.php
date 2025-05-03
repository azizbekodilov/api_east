<?php

namespace App\Livewire\Backend\Product;

use Livewire\Component;

class EditProduct extends Component
{

    public function mount()
    {
        app()->setLocale('ru');
    }

    public function render()
    {
        return view('livewire.backend.product.edit-product')->extends('adminlte::page');
    }
}
