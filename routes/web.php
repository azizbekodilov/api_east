<?php

use App\Livewire\Backend\Catalog\CatalogIndex;
use App\Livewire\Backend\Product\ProductIndex;
use App\Livewire\HomeIndex;
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
            Route::get("/products", ProductIndex::class);
        }
    );

Auth::routes();
