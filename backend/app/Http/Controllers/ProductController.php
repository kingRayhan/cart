<?php

namespace App\Http\Controllers;


use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductSingleResource;
use App\Models\Product;
use App\Scoper\Scopes\CategoryScope;

class ProductController extends Controller
{
    /**
     * Product List
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $products = Product::withScopes($this->scopes())->paginate(10);
        return ProductIndexResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }

    public function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }
}
