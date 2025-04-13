<?php

use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::middleware([Localization::class])->prefix('{locale}')->group(function () {
    Route::prefix('main')->group(function(){
        Route::get("/sliders", [IndexController::class, 'slider']);
        Route::get("/products", [IndexController::class, 'product']);
        Route::get("/our_catalog", [IndexController::class, 'ourCatalog']);
        Route::get("/news", [IndexController::class, 'news']);
    });
    Route::get("/all_catalogs", [CatalogController::class, 'allCatalogs']);
    Route::get("/catalogs", [CatalogController::class, 'index']);
    Route::get("/sliders", [SliderController::class, 'index']);
    Route::get("/products", [ProductController::class, 'index']);
    Route::get("/products/{id}", [ProductController::class, 'show']);
    Route::get("/news", [NewsController::class, 'index']);
    Route::get("/news/{id}", [NewsController::class, 'show']);
});
