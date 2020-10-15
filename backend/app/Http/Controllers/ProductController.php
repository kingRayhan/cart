<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductSingleResource;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Product List
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $category = request()->query('category');
        $products = Product::newest()->paginate(10);
        return ProductIndexResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }
}
