<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
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
            'dimensions' => $this->dimensions,
            'mark' => $this->mark,
            'locale' => $this->locale,
            'created_at' => $this->created_at,
        ];
    }
}
