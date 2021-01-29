<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    //eloquent relationship between products and categories
    public function userProducts()
    {
        return $this->hasMany(UserProduct::class);
    }
}
