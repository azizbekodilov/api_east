<?php

namespace App\Livewire\Backend\Product;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddProduct extends Component
{

    #[Rule('nullable')] public $media;
    #[Rule('nullable')] public $catalog_id;
    #[Rule('nullable')] public $partner_id;
    #[Rule('nullable')] public $price;
    #[Rule('nullable')] public $update_product_id;
    #[Rule('nullable')] public $sort;
    #[Rule('nullable')] public $thickness;
    #[Rule('nullable')] public $width;
    #[Rule('nullable')] public $length;

    public function mount()
    {
        app()->setLocale('ru');
    }

    public function save()
    {
        Product::create($this->validate());
    }

    public function render()
    {
        return view('livewire.backend.product.add-product')->extends('adminlte::page');
    }
}
