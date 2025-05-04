<?php

namespace App\Livewire\Backend\Product;

use App\Models\Catalog;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductTranslation;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    #[Rule('nullable')] public $media;
    #[Rule('nullable')] public $catalog_id;
    #[Rule('nullable')] public $partner_id;
    #[Rule('nullable')] public $price;
    #[Rule('nullable')] public $update_product_id;
    #[Rule('nullable')] public $sort;
    #[Rule('nullable')] public $thickness;
    #[Rule('nullable')] public $width;
    #[Rule('nullable')] public $length;
    #[Rule('nullable')] public $balance;
    #[Rule('nullable')] public $mark;

    #[Rule('nullable')] public $product_id;
    #[Rule('nullable')] public $title;
    #[Rule('nullable')] public $slug;
    #[Rule('nullable')] public $text;
    #[Rule('nullable')] public $short_text;
    #[Rule('nullable')] public $meta_title;
    #[Rule('nullable')] public $meta_description;
    #[Rule('nullable')] public $locale;

    public function mount()
    {
        app()->setLocale('ru');
        $this->locale = 'ru';
        $this->sort = 999;
    }

    public function save()
    {
        try {
            if ($this->media != '') {
                $file = $this->media;
                $file_name = $file->getClientOriginalName();
                $this->media = $file_name;
                $this->media->storeAs('catalogs', $file_name, 'public');
            }
            $product = Product::create(
                [
                    'media' => $this->media,
                    'thickness' => $this->thickness,
                    'width' => $this->width,
                    'length' => $this->length,
                    'catalog_id' => $this->catalog_id,
                    'partner_id' => $this->partner_id,
                    'mark' => $this->mark,
                    'price' => $this->price,
                ]
            );
            $this->product_id = $product->id;
            ProductTranslation::create(
                [
                    'product_id' => $product->id,
                    'title' => $this->title,
                    'text' => $this->text,
                    'slug' => $this->slug,
                    'short_text' => $this->short_text,
                    'meta_title' => $this->meta_title,
                    'meta_description' => $this->meta_description,
                ]
            );
            return $this->redirect('/east/products');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        $partners = Partner::get();
        $catalogs = Catalog::whereNotNull('parent_id')->get();
        return view('livewire.backend.product.add-product', compact('partners', 'catalogs'))->extends('adminlte::page');
    }
}
