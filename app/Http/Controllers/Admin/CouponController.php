<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::paginate(10);
        return view('auth.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.coupons.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $params = $request->all();
        foreach (['type', 'only_once'] as $fieldName) {
            if (isset($params[$fieldName])) {
                $params[$fieldName] = 1;
            }
        }

        if (!$request->has('type')) {
            unset($params['currency_id']);
        }

        Coupon::create($params);
        return redirect()->route('coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return view('auth.coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('auth.coupons.form', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CouponRequest  $request
     * @param  \App\Models\Coupon  $coupon
     * @return void
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $params = $request->all();
        foreach (['type', 'only_once'] as $fieldName) {
            if (isset($params[$fieldName])) {
                $params[$fieldName] = 1;
            } else {
                $params[$fieldName] = 0;
            }
        }

        if (!$request->has('type')) {
            $params['currency_id'] = null;
        }

        $coupon->update($params);
        return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index');
    }
}
