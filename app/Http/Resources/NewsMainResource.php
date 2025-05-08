<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class NewsMainResource extends JsonResource
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
            'text' => $this->short_text,
            'slug' => $this->slug,
            'locale' => $this->locale,
            'created_at' => $this->created_at(),
        ];
    }

    public function media()
    {
        return URL::asset('/storage/news/'.$this->media);
    }

    public function created_at()
    {
        return Carbon::parse($this->created_at)->format('d.m.Y');
    }
}
