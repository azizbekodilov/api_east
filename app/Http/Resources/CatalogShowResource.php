<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class CatalogShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'media' => $this->media(),
            'title' => $this->title,
            'text' => $this->text,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'locale' => $this->locale,
            'created_at' => $this->created_at,
            'products' => $this->allProducts($request),
            'filter' => $this->filter_list(),
        ];
    }

    public function allProducts($request)
    {
        if (count(Product::where('catalog_id', $this->id)->whereNotNull('height')->get())) {
            $data = Product::where('catalog_id', $this->id)
                ->when($request->setFilter, function ($q) use ($request) {
                    $q->where('height', $request->setFilter);
                })
                ->when($request->setDiscount, function ($q) use ($request) {
                    $q->where('is_discount', $request->setDiscount);
                })
                ->get();
        } else {
            $data = Product::where('catalog_id', $this->id)
                ->when($request->setFilter, function ($q) use ($request) {
                    $q->where('thickness', $request->setFilter);
                })
                ->when($request->setDiscount, function ($q) use ($request) {
                    $q->where('is_discount', $request->setDiscount);
                })
                ->get();
        }
        return ProductShowResource::collection($data);
    }

    public function media()
    {
        return URL::secure('/storage/catalogs/' . $this->catalog->media);
    }

    public function filter_list()
    {
        if (count(Product::where('catalog_id', $this->id)->whereNotNull('height')->get())) {
            return Product::where('catalog_id', $this->id)->groupBy('height')->pluck('height');
        } else {
            return Product::where('catalog_id', $this->id)->groupBy('thickness')->pluck('thickness');
        }
    }
}
