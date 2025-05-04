<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;

class NewsIndex extends Component
{

    public function mount()
    {
        app()->setLocale('ru');
    }

    public function render()
    {
        $collection = News::orderByDesc('created_at')->get();
        return view('livewire.news.news-index', compact('collection'))->extends('adminlte::page');
    }
}
