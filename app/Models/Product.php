<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    //eloquent relationship between products and users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
