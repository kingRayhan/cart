<?php


namespace App\Traits;


trait PrimaryKeySlug
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
