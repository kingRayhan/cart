<?php


namespace App\Traits;


use Illuminate\Database\Query\Builder;

trait OrderAble
{
    public function scopeLatest(Builder $query)
    {
        return $query->orderBy('created_at', 'DESC');
    }

    public function scopeOldest(Builder $query)
    {
        return $query->orderBy('created_at', 'ASC');
    }
}
