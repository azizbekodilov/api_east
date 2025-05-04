<?php

namespace App\Livewire\Backend\Product;

use App\Models\Catalog;
use App\Models\Partner;
use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
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

    public $product;
    public $translaTable;

    public function mount($id)
    {
        app()->setLocale('ru');
        $this->locale = 'ru';
        $this->sort = 999;

        $this->product = Product::find($id);
        $this->media = $this->product->media;
        $this->catalog_id = $this->product->catalog_id;
        $this->partner_id = $this->product->partner_id;
        $this->price = $this->product->price;
        $this->mark = $this->product->mark;
        $this->thickness = $this->product->thickness;
        $this->width = $this->product->width;
        $this->length = $this->product->length;
        $this->balance = $this->product->balance;
        // translatable table
        $this->translaTable = $this->product->productTranslations->where('locale',$this->locale)->first();
        $this->title = $this->translaTable->title;
        $this->slug = $this->translaTable->slug;
        $this->text = $this->translaTable->text;
        $this->short_text = $this->translaTable->short_text;
        $this->meta_title = $this->translaTable->meta_title;
        $this->meta_description = $this->translaTable->meta_description;
        $this->locale = $this->translaTable->locale;
    }

    public function save()
    {
        try {
            $this->product->catalog_id = $this->catalog_id;
            $this->product->partner_id = $this->partner_id;
            $this->product->price = $this->price;
            $this->product->thickness = $this->thickness;
            $this->product->width = $this->width;
            $this->product->length = $this->length;
            $this->product->mark = $this->mark;
            $this->product->balance = $this->balance;
            $this->product->save();

            $this->translaTable->title = $this->title;
            $this->translaTable->slug = $this->slug;
            $this->translaTable->text = $this->text;
            $this->translaTable->short_text = $this->short_text;
            $this->translaTable->meta_title = $this->meta_title;
            $this->translaTable->meta_description = $this->meta_description;
            $this->translaTable->save();
            return $this->redirect('/east/products');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        $partners = Partner::get();
        $catalogs = Catalog::whereNotNull('parent_id')->get();
        return view('livewire.backend.product.edit-product', compact('partners', 'catalogs'))->extends('adminlte::page');
    }
}
