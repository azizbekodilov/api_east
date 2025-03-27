<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Main\SliderMainResource;
use App\Models\CertificateTranslation;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Slider;
use App\Models\SliderTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function slider()
    {
        // return Slider::all();
        return SliderMainResource::collection(Slider::all());
    }

    /**
     * Display a listing of the resource.
     */
    public function news()
    {
        // return News::where('locale', App::getLocale())->latest()->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function product()
    {
        return Product::get();
    }

    /**
     * Display a listing of the resource.
     */
    public function certificate()
    {
        return CertificateTranslation::where('locale', App::getLocale())->latest()->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return ProductTranslation::where('locale', App::getLocale())->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
