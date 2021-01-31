<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //display all products in store(DB) for a users
    public function index()
    {
        $products = $user_products = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->where('users.id', '=', Auth::user()->id)
            ->select('products.*')->paginate(8);
        return view('userProducts.index', compact('products'));
    }
    //store  new product in DB
    public function create()
    {
        $conditions = ProductConditions::all();
        return view('userProducts.create', compact('condtions'));
    }
}
