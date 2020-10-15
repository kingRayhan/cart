<?php


namespace App\Scoper;

use App\Scoper\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
        foreach ($scopes as $key => $scope) {
            if (!$scope instanceof Scope) continue;
            $scope->apply($builder, $this->request->get($key));
        }
        return $builder;
    }
}
