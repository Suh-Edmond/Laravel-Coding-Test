<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $guarded = [];
    //eloquent relationship between manufacturers and user_products 
    public function userProducts()
    {
        return $this->hasMany(UserProduct::class);
    }
}
