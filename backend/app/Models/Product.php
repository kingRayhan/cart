<?php

namespace App\Models;

use App\Scoper\Scoper;
use App\Traits\OrderAble;
use App\Traits\PrimaryKeySlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, PrimaryKeySlug, OrderAble;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeWithScopes(Builder $builder, $scopes = [])
    {
        $scoper = new Scoper(request());
        return $scoper->apply($builder, $scopes);
    }
}
