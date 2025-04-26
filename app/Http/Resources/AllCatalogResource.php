<?php

namespace App\Http\Resources;

use App\Models\CatalogTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class AllCatalogResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug(),
            'text' => $this->text,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'locale' => $this->locale,
            'created_at' => $this->created_at,
            'children_cats' => $this->children_for_main()
        ];
    }

    public function slug()
    {
        return URL::secure('/api/'.app()->getLocale().'/catalogs/'.$this->slug);
    }

    public function children_for_main()
    {
        return AllCatalogChildrenResource::collection(CatalogTranslation::select('title')->whereHas('catalog', function($q){$q->where('parent_id', $this->id);})->get());
    }
}
