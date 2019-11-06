<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }
}
