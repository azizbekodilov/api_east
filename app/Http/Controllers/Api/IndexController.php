<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CallRequestStoreRequest;
use App\Http\Resources\AllCatalogResource;
use App\Http\Resources\Main\SliderMainResource;
use App\Http\Resources\MainOurCatalogResource;
use App\Http\Resources\NewsResource;
use App\Http\Resources\ProductResource;
use App\Models\CallRequests;
use App\Models\Catalog;
use App\Models\CertificateTranslation;
use App\Models\News;
use App\Models\NewsTranslation;
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
        return NewsResource::collection((News::get()));
    }

    /**
     * Display a listing of the resource.
     */
    public function product()
    {
        return ProductResource::collection(ProductTranslation::where('locale', app()->getLocale())->get());
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
    public function ourCatalog()
    {
        return MainOurCatalogResource::collection(Catalog::with(['children_for_main'=>function($query) {
            return $query->limit(4);
        }])->where('parent_id',null)->take(4)->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return ProductTranslation::where('locale', App::getLocale())->latest()->get();
    }

    public function footerCatalog()
    {
        return MainOurCatalogResource::collection(Catalog::with(['children_for_main'=>function($query) {
            return $query->limit(4);
        }])->where('parent_id',null)->take(4)->get());
    }

    public function requestCall(CallRequestStoreRequest $request)
    {
        $validated = $request->validated();
        CallRequests::create($validated);
    }

    public function requestContact(CallRequestStoreRequest $request)
    {
        $validated = $request->validated();
        CallRequests::create($validated);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $data = ProductTranslation::
        where('title', 'LIKE', '%' . $search . '%')->orWhere('text', 'LIKE', '%' . $search . '%')
        ->get();

        return response()->json($data);
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
