<?php

use App\Livewire\Backend\Catalog\AddCatalog;
use App\Livewire\Backend\Catalog\CatalogIndex;
use App\Livewire\Backend\Catalog\EditCatalog;
use App\Livewire\Backend\Product\AddProduct;
use App\Livewire\Backend\Product\EditProduct;
use App\Livewire\Backend\Product\ProductIndex;
use App\Livewire\HomeIndex;
use App\Livewire\News\AddNews;
use App\Livewire\News\EditNews;
use App\Livewire\News\NewsIndex;
use App\Livewire\Slider\AddSlider;
use App\Livewire\Slider\EditSlider;
use App\Livewire\Slider\SliderIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');


Route::prefix('/east')
    ->middleware(['auth', 'verified'])
    ->group(
        function () {
            Route::get("/", HomeIndex::class);
            Route::get("/catalogs", CatalogIndex::class);
            Route::get("/catalogs/add", AddCatalog::class);
            Route::get("/catalogs/{id}", EditCatalog::class);
            Route::get("/products", ProductIndex::class);
            Route::get("/products/add", AddProduct::class);
            Route::get("/products/{id}", EditProduct::class);
            Route::get("/news", NewsIndex::class);
            Route::get("/news/add", AddNews::class);
            Route::get("/news/{id}", EditNews::class);
            Route::get("/sliders", SliderIndex::class);
            Route::get("/sliders/add", AddSlider::class);
            Route::get("/sliders/{id}", EditSlider::class);
        }
    );

Auth::routes();
