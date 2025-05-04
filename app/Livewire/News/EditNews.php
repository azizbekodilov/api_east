<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditNews extends Component
{
    use WithFileUploads;

    public $news;

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
        $this->news = News::find($id);
        $this->parent_id = $this->news->parent_id;
        $this->sort = $this->news->parent_id;
        $this->is_main = $this->news->is_main;
        $this->translatable = $this->news->newsTranslation->where('locale', $this->locale)->first();
        $this->title = $this->translatable->title;
        $this->text = $this->translatable->text;
        $this->slug = $this->translatable->slug;
        $this->short_text = $this->translatable->short_text;
        $this->meta_title = $this->translatable->meta_title;
        $this->meta_description = $this->translatable->meta_description;
    }

    public function save()
    {
        $this->news->update($this->validate());
        $this->translatable->title = $this->title;
        $this->translatable->slug = $this->slug;
        $this->translatable->text = $this->text;
        $this->translatable->short_text = $this->short_text;
        $this->translatable->meta_title = $this->meta_title;
        $this->translatable->meta_description = $this->meta_description;
        $this->translatable->save();
        $this->redirect('/east/news');
    }

    public function render()
    {
        return view('livewire.news.edit-news')->extends('adminlte::page');
    }
}
