<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['code', 'name', 'description', 'image', 'name_en', 'description_en'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
