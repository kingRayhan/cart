<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasParent
{
    public function scopeParents(Builder $query)
    {
        return $query->whereNull('parent_id');
    }
}
