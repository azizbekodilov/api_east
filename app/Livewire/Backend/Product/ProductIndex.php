<?php

namespace App\Livewire\Backend\Product;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public $selectLang;

    public function mount()
    {
        app()->setLocale('ru');
    }

    public function render()
    {
        $collection = Product::orderByDesc('created_at')->get();
        return view('livewire.backend.product.product-index', compact('collection'))->extends('adminlte::page');
    }
}
