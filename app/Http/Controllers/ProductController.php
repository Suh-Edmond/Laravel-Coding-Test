<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //display all products in store(DB)
    public function index()
    {
        $products = Product::paginate(8);
        //dd($products);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }
}
