<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    //display all available product
    public function index()
    {
        $products = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->select('*')->paginate(8);

        return view('products.index', compact('products'));
    }
}
