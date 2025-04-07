<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public $preserveKeys = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>  $this->id,
            'product_id'=>$this->product->id,
            'title' => $this->title,
            'name' => $this->text,
            'slug' => $this->slug,
            'locale' => $this->locale,
            'short_text' => $this->short_text,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'attributeDetail' => $this->attributeDetail(),
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

}
