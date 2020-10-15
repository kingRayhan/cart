<?php

namespace App\Models;

use App\Traits\HasParent;
use App\Traits\OrderAble;
use App\Traits\PrimaryKeySlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory, HasParent, OrderAble, PrimaryKeySlug;

    public function scopeOrdered(Builder $query, $orientation = 'ASC')
    {
        return $query->orderBy('order', $orientation);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
