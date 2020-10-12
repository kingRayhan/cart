<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OrderAble
{
    public function scopeNewest(Builder $query)
    {
        return $query->orderBy('created_at', 'DESC');
    }

    public function scopeOldest(Bui $query)
    {
        return $query->orderBy('created_at', 'ASC');
    }
}
