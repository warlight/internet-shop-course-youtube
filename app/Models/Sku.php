<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $fillable = ['rpdocut_id', 'count', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //TODO: check table name and fields
    public function skus()
    {
        return $this->belongsToMany(PropertyOption::class);
    }
}
