<?php

namespace App\Models;

use App\Traits\OrderAble;
use App\Traits\PrimaryKeySlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Category extends Model
{
    use HasFactory, OrderAble, PrimaryKeySlug;

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
