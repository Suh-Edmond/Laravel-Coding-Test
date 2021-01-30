<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class UserProductController extends Controller
{
    private $msg; //feedback message created product
    private $msg_del; //feedback for
    //get all products own by a particular user
    public function index()
    {
        $user_id = 1; //fake userid
        $user_products = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->where('users.id', '=', $user_id)
            ->select('products.id', 'products.product_name', 'user_products.price')->paginate(4);
        //dd($user_products);
        return view('userProducts.index', compact('user_products'));
    }
    //add product to stock
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return view('userProducts.create', compact('products', 'categories', 'manufacturers'));
    }
    //store products
    public function store()
    {
        $user_id = 1; //Fake userid
        $data = request()->all();
        $created = UserProduct::insert([
            'user_id' => $user_id,
            'product_id' => $data['product_id'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'manufactural_id' => $data['manufactural_id']
        ]);
        $this->msg = "Product was Successfully Added to Stock";
        Session::flash('message', $this->message);
        return redirect('/user/products');
    }
    //show the details of aproduct
    public function show($id)
    {
        $user_id = 1; //fake userid
        $product = $this->productDetails($user_id, $id);
        return view('userProducts.show', compact('product', 'id'));
    }
    //detailsof each product
    private function productDetails($user_id, $product_id)
    {
        $product = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->join('categories', 'categories.id', '=', 'user_products.category_id')
            ->join('manufacturers', 'manufacturers.id', '=', 'user_products.manufactural_id')
            ->where('users.id', '=', $user_id)
            ->where('products.id', '=', $product_id)
            ->select(
                'products.id',
                'products.product_name',
                'user_products.price',
                'user_products.description',
                'user_products.price',
                'user_products.quantity',
                'categories.type',
                'manufacturers.manufacturer_name',
                'users.name',
                'users.email'
            )->get();
        return $product;
    }
    // //edit form for products
    public function edit($id)
    {
        $user_id = 1;
        $products = Product::all();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $product_details = $this->detail($user_id, $id);
        //dd($product_details[0]->product_id);
        return view('userProducts.edit', compact('products', 'categories', 'manufacturers', 'product_details'));
    }

    //details for aproduct
    private function detail($user_id, $product_id)
    {
        $details = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->join('categories', 'categories.id', '=', 'user_products.category_id')
            ->join('manufacturers', 'manufacturers.id', '=', 'user_products.manufactural_id')
            ->where('users.id', '=', $user_id)
            ->where('products.id', '=', $product_id)
            ->select('user_products.product_id', 'user_products.price', 'user_products.quantity', 'user_products.description', 'user_products.category_id', 'user_products.manufactural_id')->get();
        return $details;
    }
    //update product details
    public function update($id)
    {
        $user_id = 1;
        $updated = UserProduct::where('user_id', '=', $user_id)->where('product_id', '=', $id)->update(request()->except(['_token', '_method']));
        //dd($updated);
        return redirect('/user/products/' . $id);
    }
    //delete a product
    public function destroy($id)
    {

        UserProduct::where('user_id', 1)->where('product_id', '=', $id)->delete();
        return redirect('/user/products');
    }
}
