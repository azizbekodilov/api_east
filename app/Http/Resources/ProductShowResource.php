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
            'title' => $this->title,
            'text' => $this->text,
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

}
