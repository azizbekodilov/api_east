<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class SliderMainResource extends JsonResource
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
            'info' => $this->info,
            'sort' => $this->sort,
            'media' => $this->media(),
            'locale' => $this->locale,
        ];
    }

    public function media()
    {
        return URL::asset($this->media);
    }
}
