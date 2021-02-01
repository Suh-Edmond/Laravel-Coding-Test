<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'price', 'quantity', 'description', 'product_condition_id', 'service', 'discount', 'in_stocked', 'published', 'image'];
    //eloquent relationship between products and users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    //eloquent relationship between products and conditions
    public function productCondition()
    {
        return $this->belongsTo('App\Models\ProductConditions');
    }
}
