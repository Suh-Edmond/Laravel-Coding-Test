<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $gaurded = [];
    //eloquent relationship between products and users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    //eloquent relationship between products and conditions
    public function condition()
    {
        return $this->belongsTo(ProductConditions::class);
    }
}
