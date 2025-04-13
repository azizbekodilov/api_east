<?php

use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\PartnerController;
use App\Http\Middleware\Localization;
use App\Models\OurTeam;
use App\Models\Sertificate;
use Illuminate\Support\Facades\Route;

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
    // sertifikatlar
    Route::get("/news", [NewsController::class, 'index']);
    // yangilik haqida ma'lumot
    Route::get("/news/{slug}", [NewsController::class, 'show']);
    // bizning jamoa
    Route::get('/our_team', [OurTeamController::class, 'index']);
    // xamkorlar
    Route::get('/partners', [PartnerController::class, 'index']);
});
