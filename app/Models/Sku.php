<?php

namespace App\Models;

use App\Services\CurrencyConversion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'count', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function propertyOptions()
    {
        return $this->belongsToMany(PropertyOption::class, 'sku_property_option')->withTimestamps();
    }

    public function isAvailable()
    {
        return !$this->product->trashed() && $this->count > 0;
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function getPriceAttribute($value)
    {
        return round(CurrencyConversion::convert($value), 2);
    }
}
