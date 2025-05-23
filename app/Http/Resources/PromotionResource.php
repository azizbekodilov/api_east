<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

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
            'media' => $this->discount(),
            // 'discount' => $this->discount(),
            'title' => $this->title,
            'dimensions' => $this->dimensions(),
            'mark' => $this->mark,
            'locale' => $this->locale,
            'created_at' => $this->created_at,
        ];
    }

    public function media()
    {
        return URL::secure('/storage/products/'.$this->media);
    }
    public function discount()
    {
        return URL::secure('/storage/discounts/'.$this->discount_media);
    }

    public function dimensions()
    {
        if($this->height) {
            return $this->width . 'x' . $this->height . 'x' . $this->thickness . 'x' . $this->length;
        } elseif ($this->length) {
            return $this->thickness . 'x' . $this->width . 'х' . $this->length;
        } elseif($this->width) {
            return $this->thickness . 'x' . $this->width;
        } else {
            return $this->thickness;
        }
    }
}
