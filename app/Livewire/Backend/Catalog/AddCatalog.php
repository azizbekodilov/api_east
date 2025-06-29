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
    #[Rule('nullable')] public $parent_id = null;

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
            $validate = $this->validate();
            if ($this->media instanceof \Illuminate\Http\UploadedFile) {
                $file = $this->media;
                $file_name = time() . '_' . $file->getClientOriginalName(); // unique file name
                $validate['media'] = $file_name;
                $file->storeAs('catalogs', $file_name, 'public');
            }
            $catalog = Catalog::create($validate);
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
        $catalogs = Catalog::where('parent_id', null)->get();
        return view('livewire.backend.catalog.add-catalog', compact('catalogs'))->extends('adminlte::page');
    }
}
