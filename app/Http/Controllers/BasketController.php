<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Http\Requests\AddCouponRequest;
use App\Models\Coupon;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();
        return view('basket', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
        $basket = new Basket();
        if ($basket->getOrder()->hasCoupon() && !$basket->getOrder()->coupon->availableForUse()) {
            $basket->clearCoupon();
            session()->flash('warning', __('basket.coupon.not_available'));
            return redirect()->route('basket');
        }
        $email = Auth::check() ? Auth::user()->email : $request->email;
        if ($basket->saveOrder($request->name, $request->phone, $email)) {
            session()->flash('success', __('basket.you_order_confirmed'));
        } else {
            session()->flash('warning', __('basket.you_cant_order_more'));
        }

        return redirect()->route('index');
    }

    public function basketPlace()
    {
        $basket = new Basket();
        $order = $basket->getOrder();
        if (!$basket->countAvailable()) {
            session()->flash('warning', __('basket.you_cant_order_more'));
            return redirect()->route('basket');
        }
        return view('order', compact('order'));
    }

    public function basketAdd(Sku $skus)
    {
        $result = (new Basket(true))->addSku($skus);

        if ($result) {
            session()->flash('success', __('basket.added').$skus->product->__('name'));
        } else {
            session()->flash('warning', $skus->product->__('name').__('basket.not_available_more'));
        }

        return redirect()->route('basket');
    }

    public function basketRemove(Sku $skus)
    {
        (new Basket())->removeSku($skus);

        session()->flash('warning', __('basket.removed').$skus->product->__('name'));

        return redirect()->route('basket');
    }

    public function setCoupon(AddCouponRequest $request)
    {
        $coupon = Coupon::where('code', $request->coupon)->first();

        if ($coupon->availableForUse()) {
            (new Basket())->setCoupon($coupon);
            session()->flash('success', __('basket.coupon.coupon_added'));
        } else {
            session()->flash('warning', __('basket.coupon.not_available'));
        }

        return redirect()->route('basket');
    }
}
