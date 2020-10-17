<?php

namespace App\Http\Resources;

use App\Http\Resources\Category\MainCategoriesResource;
use App\Http\Resources\Product\ProductVariationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'price' => $this->formattedPrice,
            'variations' => ProductVariationResource::collection($this->variations->groupBy('type.name')),
            'categories' => MainCategoriesResource::collection($this->categories),
            'time' => $this->created_at->diffForHumans()
        ]);
    }
}
