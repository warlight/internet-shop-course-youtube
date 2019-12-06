<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['code', 'name', 'description', 'image'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
