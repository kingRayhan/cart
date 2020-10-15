<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Get all resources
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $categories = Category::query()
            ->parents()
            ->orderBy('order', 'ASC')
            ->paginate(5);

        return CategoryResource::collection($categories);
    }

    public function store()
    {

    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function productsOfCategory(Category $category)
    {
//        return ProductIndexResource::collection($category->products->paginate(10));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
