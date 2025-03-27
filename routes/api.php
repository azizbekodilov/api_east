<?php

use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::middleware([Localization::class])->prefix('{locale}')->group(function () {
    Route::prefix('main')->group(function(){
        Route::get("/sliders", [IndexController::class, 'slider']);
        Route::get("/products", [IndexController::class, 'product']);
        Route::get("/news", [IndexController::class, 'news']);
    });
    Route::get("/sliders", [SliderController::class, 'index']);
    Route::get("/products", [ProductController::class, 'index']);
    Route::get("/product/{id}", [ProductController::class, 'show']);
    Route::get("/news", [NewsController::class, 'index']);
    Route::get("/news/{id}", [NewsController::class, 'show']);
});
