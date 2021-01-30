<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //display all products in store(DB)
    public function index()
    {
        $products = $user_products = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->select('products.id', 'products.product_name', 'products.price')->paginate(8);
        return view('products.index', compact('products'));
    }
    //create  new product
    public function store()
    {
        $data = request()->all();
        Product::create($data);
        return back();
    }
}
