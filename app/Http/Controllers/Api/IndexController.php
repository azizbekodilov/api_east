<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\{CallRequestStoreRequest,StoreRequestPriceRequest};
use App\Http\Resources\Main\SliderMainResource;
use App\Http\Resources\{MainOurCatalogResource,NewsMainResource,ProductResource,PromotionResource};
use App\Models\{CallRequests,Catalog,CertificateTranslation,News,Product,ProductTranslation,RequestPrice,Slider};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Telegram\Bot\Laravel\Facades\Telegram;

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
        return NewsMainResource::collection((News::get()));
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
        return MainOurCatalogResource::collection(Catalog::with('children_for_main')->where('parent_id',null)->take(10)->get());
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
        $text = '📌Новая заявка:'. PHP_EOL . '🔸 Имя: ' . $validated['name'] . PHP_EOL . '☎️ Телефон: ' . $validated['phone'];
        Telegram::sendMessage(
            [
                'chat_id' => '-1001833643884',
                'text' => $text,
            ]
        );
        return response()->json(['success' => 'true', 'message' => 'Ваши сообщение успешьно отправлено']);
    }

    public function requestContact(CallRequestStoreRequest $request)
    {
        $validated = $request->validated();
        CallRequests::create($validated);
        $text = '📌Новая заявка:'. PHP_EOL . '🔸 Имя: ' . $validated['name'] . PHP_EOL . '☎️ Телефон: ' . $validated['phone'];
        Telegram::sendMessage(
            [
                'chat_id' => '-1001833643884',
                'text' => $text,
            ]
        );
        return response()->json(['success' => 'true', 'message' => 'Ваши сообщение успешьно отправлено']);
    }

    public function requestPrice(StoreRequestPriceRequest $request)
    {
        $validated = $request->validated();
        RequestPrice::create($validated);
        return response()->json(['success' => 'true', 'message' => 'Ваши сообщение успешьно отправлено']);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = Product::whereHas('productTranslations', function($q) use($search) {
            $q->where('title', 'LIKE', '%' . $search . '%');
            $q->orWhere('text', 'LIKE', '%' . $search . '%');
        })->get();

        return response()->json($data);
    }

    public function promotion()
    {
        $data = Product::where('is_discount',1)->get();

        return PromotionResource::collection($data);
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
