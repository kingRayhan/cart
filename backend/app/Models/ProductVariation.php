<?php

namespace App\Models;

use App\AppHelpers\Money;
use App\Traits\HasPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory, HasPrice;

    public function getPriceAttribute($price)
    {
        if ($price == null)
            return $this->product->price;
        return new Money($price);
    }

    public function type()
    {
        return $this->hasOne(ProductVariationType::class, 'id', 'product_variation_type_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getIsPriceVariesAttribute()
    {
        return $this->price->amount() != $this->product->price->amount();
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
