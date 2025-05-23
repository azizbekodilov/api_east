<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ProductShowResource extends JsonResource
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
            'title' => $this->title . ' ' . $this->addTitle(),
            'text' => $this->text,
            'price' => $this->price,
            'slug' => $this->slug,
            'mark' => $this->mark,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'locale' => $this->locale,
            'created_at' => $this->created_at,
        ];
    }

    public function attributeDetail()
    {
        $data = [];
        foreach ($this->product->productAttribute as $key => $value) {
            $data [] =  [
                    'id' => $value->id,
                    'title' => $value->title,
                    'value' => $value->pivot->value,
                    'sort' => $value->pivot->sort,
                    'is_filter' => $value->is_filter,
                ];
        }
        return $data;
    }

    public function media()
    {
        return URL::secure('/storage/products/'.$this->media);
    }

    public function addTitle()
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
