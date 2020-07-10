<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sku;

class SkusController extends Controller
{
    public function getSkus()
    {
        return Sku::with('product')
            ->available()
            ->get()
            ->append('product_name');
    }
}
