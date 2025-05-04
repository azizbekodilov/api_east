<?php

namespace App\Livewire\News;

use App\Models\News;
use App\Models\NewsTranslation;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNews extends Component
{

    use WithFileUploads;

    #[Rule('required')] public $media;

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
    }

    public function save()
    {
        try {
            $news = News::create($this->validate());
            NewsTranslation::create(
                [
                    'title' => $this->title,
                    'news_id' => $news->id,
                    'slug' => $this->slug,
                    'text' => $this->text,
                    'locale' => $this->locale,
                    'short_text' => $this->short_text,
                    'meta_title' => $this->meta_title,
                    'meta_description' => $this->meta_description,
                ]
            );
            $this->redirect('/east/news');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.news.add-news')->extends('adminlte::page');
    }
}
