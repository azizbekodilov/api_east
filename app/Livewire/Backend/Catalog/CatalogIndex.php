<?php

namespace App\Livewire\Backend\Catalog;

use App\Models\Catalog;
use Livewire\Component;

class CatalogIndex extends Component
{
    public $selectLang;

    public function mount()
    {
        app()->setLocale('ru');
    }

    public function render()
    {
        $collection = Catalog::with('children')->get();
        return view('livewire.backend.catalog.catalog-index', compact('collection'))->extends('adminlte::page');
    }
}
