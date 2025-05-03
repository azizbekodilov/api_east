<?php

namespace App\Livewire\Backend\Catalog;

use Livewire\Component;

class CatalogIndex extends Component
{
    public function render()
    {
        return view('livewire.backend.catalog.catalog-index')->extends('adminlte::page');
    }
}
