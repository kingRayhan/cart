<?php


namespace App\Scoper;

use App\Scoper\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Scoper
{
    private $request;

    /**
     * Scoper constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder, array $scopes)
    {
        foreach ($this->limitedScopes($scopes) as $key => $scope) {
            if (!$scope instanceof Scope) continue;
            $scope->apply($builder, $this->request->get($key));
        }
        return $builder;
    }


    private function limitedScopes(array $scopes)
    {
        return Arr::only($scopes, array_keys($this->request->all()));
    }
}
