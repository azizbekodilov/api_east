<?php

namespace App\Livewire\Backend\Catalog;

use App\Models\Catalog;
use App\Models\CatalogTranslation;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCatalog extends Component
{
    use WithFileUploads;

    #[Rule('required')] public $media;
    #[Rule('nullable')] public $sort;
    #[Rule('nullable')] public $is_main;
    #[Rule('nullable')] public $parent_id;

    public $title;
    public $short_text;
    public $text;
    public $meta_title;
    public $meta_description;
    public $slug;
    public $locale;

    public function mount()
    {
        app()->setLocale('ru');
        $this->locale = 'ru';
        $this->sort = 9;
        $this->is_main = 0;
    }

    public function save()
    {
        try {
            $catalog = Catalog::create($this->validate());
            CatalogTranslation::create(
                [
                    'title' => $this->title,
                    'catalog_id' => $catalog->id,
                    'slug' => $this->slug,
                    'text' => $this->text,
                    'locale' => $this->locale,
                    'short_text' => $this->short_text,
                    'meta_title' => $this->meta_title,
                    'meta_description' => $this->meta_description,
                ]
            );
            $this->redirect('/east/catalogs');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.backend.catalog.add-catalog')->extends('adminlte::page');
    }
}
