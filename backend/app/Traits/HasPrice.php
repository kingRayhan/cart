<?php


namespace App\Traits;

use App\AppHelpers\Money;

trait HasPrice
{
    public function getPriceAttribute($price)
    {
        return new Money($price);
    }

    public function getFormattedPriceAttribute()
    {
        return $this->price->formatted();
    }
}
