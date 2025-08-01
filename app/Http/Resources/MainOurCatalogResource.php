<?php

namespace App\Http\Resources;

use App\Models\Catalog;
use App\Models\CatalogTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MainOurCatalogResource extends JsonResource
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
            'locale' => $this->locale,
            'slug' => $this->slug,
            'children_cats' => $this->children_for_main()
        ];
    }

    public function children_for_main()
    {
        $data = CatalogTranslation::select('title', 'slug')->whereHas('catalog', function($q)
        {
            $q->where('parent_id', $this->id);
        }
        )->take(10)->get();
        return CatalogTranslationTitleSlugResource::collection($data);
    }

    private function media()
    {
        return "https://api.eastmetprokat.uz/storage/catalogs/".$this->media;
    }

}
