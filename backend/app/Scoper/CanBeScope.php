<?php


namespace App\Scoper;

use Illuminate\Database\Eloquent\Builder;

trait CanBeScope
{
    public function scopeWithScopes(Builder $builder, $scopes = [])
    {
        $scoper = new Scoper(request());
        return $scoper->apply($builder, $scopes);
    }
}
