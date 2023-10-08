<?php

namespace App\Http\Resources\Paste;

use Illuminate\Http\Resources\Json\JsonResource;

class PasteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'user_id' => $this->user_id,
            'url_selector' => $this->url_selector,
            'title' => $this->title,
            'content' => $this->content,
            'access_type' => $this->access_type,

        ];
    }
}
