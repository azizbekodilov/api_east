<?php

namespace App\Livewire\Backend\Catalog;

use App\Models\Catalog;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditCatalog extends Component
{

    public $catalog;

    #[Rule('nullable')] public $media;
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
    public $translatable;

    public function mount($id)
    {
        app()->setLocale('ru');
        $this->locale = 'ru';
        $this->catalog = Catalog::find($id);
        $this->parent_id = $this->catalog->parent_id;
        $this->sort = $this->catalog->parent_id;
        $this->is_main = $this->catalog->is_main;
        $this->translatable = $this->catalog->catalogTanslation->where('locale', $this->locale)->first();
        $this->title = $this->translatable->title;
        $this->text = $this->translatable->text;
        $this->slug = $this->translatable->slug;
        $this->short_text = $this->translatable->short_text;
        $this->meta_title = $this->translatable->meta_title;
        $this->meta_description = $this->translatable->meta_description;
    }

    public function save()
    {
        $this->catalog->update($this->validate());
        $this->translatable->title = $this->title;
        $this->translatable->slug = $this->slug;
        $this->translatable->text = $this->text;
        $this->translatable->short_text = $this->short_text;
        $this->translatable->meta_title = $this->meta_title;
        $this->translatable->meta_description = $this->meta_description;
        $this->translatable->save();
        $this->redirect('/east/catalogs');
    }

    public function render()
    {
        return view('livewire.backend.catalog.edit-catalog')->extends('adminlte::page');
    }
}
