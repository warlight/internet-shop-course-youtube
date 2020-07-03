<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'currency_id', 'sum', 'coupon_id'];

    public function skus()
    {
        return $this->belongsToMany(Sku::class)->withPivot(['count', 'price'])->withTimestamps();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function calculateFullSum()
    {
        $sum = 0;
        foreach ($this->skus()->withTrashed()->get() as $sku) {
            $sum += $sku->getPriceForCount();
        }
        return $sum;
    }

    public function getFullSum($withCoupon = true)
    {
        $sum = 0;

        foreach ($this->skus as $sku) {
            $sum += $sku->price * $sku->countInOrder;
        }

        if ($withCoupon && $this->hasCoupon()) {
            $sum = $this->coupon->applyCost($sum, $this->currency);
        }

        return $sum;
    }

    public function saveOrder($name, $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->status = 1;
        $this->sum = $this->getFullSum();

        $skus = $this->skus;
        $this->save();

        foreach ($skus as $skuInOrder) {
            $this->skus()->attach($skuInOrder, [
                'count' => $skuInOrder->countInOrder,
                'price' => $skuInOrder->price,
            ]);
        }

        session()->forget('order');
        return true;
    }

    public function hasCoupon()
    {
        return $this->coupon;
    }
}
