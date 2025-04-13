<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AllCatalogResource;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\CatalogShowResource;
use App\Http\Resources\ProductListResource;
use App\Models\Catalog;
use App\Models\CatalogTranslation;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogResource::collection(Catalog::with('children')->where('parent_id',null)->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Request $request)
    {
        return CatalogResource::collection(CatalogTranslation::whereHas('catalog', function($q){
            $q->where('parent_id',null);
        })->where('slug', $request->slug)->get());
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


    public function allCatalogs()
    {
        return AllCatalogResource::collection(Catalog::with('children')->where('parent_id',null)->get());
    }

}
