<?php

namespace App\Scoper\Scopes;

use App\Scoper\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class CategoryScope implements Scope
{
    public function apply(Builder $builder, $value)
    {
        if (empty(strlen($value))) return $builder;

        return $builder->whereHas('categories', function ($category) use ($value) {
            $category->where('slug', $value);
        });
    }
}
