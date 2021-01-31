<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductConditions extends Model
{
    use HasFactory;
    protected $guarded = [];

    //eloquent relationship between products and product conditions
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
