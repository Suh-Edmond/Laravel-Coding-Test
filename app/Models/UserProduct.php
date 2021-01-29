<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    //eloquent relationship between user_products and categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //eloquent relationship between user_products and manufacturers
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
