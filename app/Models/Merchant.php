<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Merchant extends Authenticatable
{
    protected $fillable = ['name', 'email', 'token'];

    public function createToken()
    {
        $token = Str::random(60);
        $this->token = hash('sha256', $token);
        $this->save();

        return $token;
    }
}
