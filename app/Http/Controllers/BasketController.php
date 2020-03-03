<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
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
        $email = Auth::check() ? Auth::user()->email : $request->email;
        if ((new Basket())->saveOrder($request->name, $request->phone, $email)) {
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

    public function basketAdd(Product $product)
    {
        $result = (new Basket(true))->addProduct($product);

        if ($result) {
            session()->flash('success', __('basket.added').$product->name);
        } else {
            session()->flash('warning', $product->name . __('basket.not_available_more'));
        }

        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);

        session()->flash('warning', __('basket.removed').$product->name);

        return redirect()->route('basket');
    }
}
