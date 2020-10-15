<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'url' => route('products.show', $this),
            'title' => $this->title,
            'slug' => $this->slug,
            'price' => $this->price,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
