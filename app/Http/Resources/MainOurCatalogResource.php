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
            'media' => $this->media,
            'title' => $this->title,
            'locale' => $this->locale,
            'children_cats' => $this->children_for_main()
        ];
    }

    public function children_for_main()
    {
        return CatalogTranslation::select('title')->whereHas('catalog', function($q)
        {
            $q->where('parent_id', $this->id);
        }
        )->take(2)->get();
    }

}
