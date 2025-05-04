<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class OurTeamResource extends JsonResource
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
            'telegram' => $this->telegram,
            'instagram' => $this->instagram,
            'phone' => $this->phone,
            'profession' => $this->profession,
            'created_at' => $this->created_at,
        ];
    }

    public function media()
    {
        return URL::asset('/storage/employees/'.$this->media);
    }
}
