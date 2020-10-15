<?php


namespace App\Scoper\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface Scope
{
    public function apply(Builder $builder, $scopes);
}
