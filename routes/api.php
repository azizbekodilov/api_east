<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\PartnerController as ApiPartnerController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::middleware([Localization::class])->prefix('{locale}')->group(function () {
    Route::prefix('main')->group(function(){
        // bosh sahifa slider
        Route::get("/sliders", [IndexController::class, 'slider']);
        // bosh sahifa tovarlar
        Route::get("/products", [IndexController::class, 'product']);
        // bosh sahifa bizning katalog
        Route::get("/our_catalog", [IndexController::class, 'ourCatalog']);
        // bosh sahifa bizning yangiliklar
        Route::get("/news", [IndexController::class, 'news']);
        // bosh sahifa sertifikat
        Route::get("/sertificate", [IndexController::class, 'sertificate']);
        // bosh sahifa partners
        Route::get('/partners', [ApiPartnerController::class, 'index']);
        Route::get('/footer_catalog', [IndexController::class, 'footerCatalog']);
    });
    // barcha kataloglar subkataloglar bilan
    Route::get("/all_catalogs", [CatalogController::class, 'allCatalogs']);
    // kataloglar ro'yhati
    Route::get("/catalogs", [CatalogController::class, 'index']);
    // childreni bor katalog subkataloglari
    Route::get("/catalogs/{slug}", [CatalogController::class, 'show']);
    // katalogda tanlangan tovarlar ro'yxati
    Route::get("/products/{slug}", [ProductController::class, 'index']);
    // tovar haqida ma'lumot
    Route::get("/products_info/{id}", [ProductController::class, 'show']);
    // yangiliklar
    Route::get("/news", [NewsController::class, 'index']);
    // yangilik haqida ma'lumot
    Route::get("/news/{slug}", [NewsController::class, 'show']);
    // bizning jamoa
    Route::get('/search', [IndexController::class, 'search']);
    Route::get('/our_team', [EmployeeController::class, 'index']);
    // xamkorlar
    Route::get('/partners', [ApiPartnerController::class, 'index']);
});

Route::post('/request_call', [IndexController::class, 'requestCall']);
Route::post('/request_contact', [IndexController::class, 'requestContact']);
Route::post('/request_price', [IndexController::class, 'requestPrice']);
