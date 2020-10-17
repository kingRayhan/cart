<?php

namespace App\Models;

use App\Scoper\CanBeScope;
use App\Traits\HasPrice;
use App\Traits\OrderAble;
use App\Traits\PrimaryKeySlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory, PrimaryKeySlug, OrderAble, CanBeScope, HasPrice;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
