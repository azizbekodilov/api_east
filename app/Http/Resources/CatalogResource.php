<?php

namespace App\Http\Resources;

use App\Models\CatalogTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CatalogResource extends JsonResource
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
            'text' => $this->text,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'locale' => $this->locale,
            'created_at' => $this->created_at,
            'children_for_main' => $this->children_for_main(),
        ];
    }

    public function children_for_main()
    {
        return CatalogTranslation::select('title')->whereHas('catalog', function($q)
        {
            $q->where('parent_id', $this->id);
        }
        )->get();
    }
}
