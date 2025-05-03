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
        return Product::where('catalog_id', $this->id)
        ->when($request->setFilter, function($q) use($request){
            $q->where('thickness', $request->setFilter);
        })
        ->get();
    }

    public function media()
    {
        return URL::secure('/storage/products/'.$this->catalog->media);
    }

    public function filter_list()
    {
        return Product::where('catalog_id', $this->id)->groupBy('thickness')->pluck('thickness');
    }
}
