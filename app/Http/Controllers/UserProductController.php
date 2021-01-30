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
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    private $msg; //feedback message created product
    private $msg_del; //feedback for  deleted product
    private $msg_update; //feedback fr updated ptoduct


    //get all products own by a particular user
    public function index()
    {
        $user_id = Auth::user()->id; //fake userid
        $user_products = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->where('users.id', '=', $user_id)
            ->select('products.id', 'products.product_name', 'user_products.price')->paginate(4);
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
        $user_id = Auth::user()->id; //Fake userid
        $data = request()->all();

        if ($data['category_id'] == "Select Category" || $data['manufactural_id'] == "Select Manufacturer") {
            $created = UserProduct::insert([
                'user_id' => $user_id,
                'product_id' => $data['product_id'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'description' => $data['description'],
                'category_id' => null,
                'manufactural_id' => null
            ]);
        } else {
            $created = UserProduct::insert([
                'user_id' => $user_id,
                'product_id' => $data['product_id'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'category_id' => $data['category_id'],
                'description' => $data['description'],
                'manufactural_id' => $data['manufactural_id']
            ]);
        }

        $this->msg = "Product was Successfully Added to Stock";
        Session::flash('message', $this->msg);
        return redirect('/user/products');
    }
    //show the details of aproduct
    public function show($id)
    {
        $user_id = Auth::user()->id; //fake userid
        $product = $this->productDetails($user_id, $id);
        for ($i = 0; $i < 1; $i++) {
            $category_type = Category::where('id', '=', $product[$i]->category_id)->pluck('type');
            $manufacturer = Manufacturer::where('id', '=', $product[$i]->manufactural_id)->pluck('manufacturer_name');
        }
        // dd($manufacturer);
        return view('userProducts.show', compact('product', 'id', 'category_type', 'manufacturer'));
    }
    //detailsof each product
    private function productDetails($user_id, $product_id)
    {
        $product = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->where('users.id', '=', $user_id)
            ->where('products.id', '=', $product_id)
            ->select(
                'products.id',
                'products.product_name',
                'user_products.price',
                'user_products.description',
                'user_products.price',
                'user_products.quantity',
                'users.name',
                'users.email',
                'user_products.category_id',
                'user_products.manufactural_id'
            )->get();
        return $product;
    }
    // //edit form for products
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $products = Product::all();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $product_details = $this->productDetails($user_id, $id);

        // if ($product_details != null) {
        //     for ($i = 0; $i < 1; $i++) {
        //         if ($product_details[$i]->category_id  != null && $product_details[$i]->manufactural_id  != null) {
        //             $manufacturer_name = Manufacturer::where('id', '=', $product_details[$i]->manufactural_id)->pluck('manufacturer_name');
        //             $category_type = Category::where('id', '=', $product_details[$i]->category_id)->pluck('type');
        //         } else {
        //             $manufacturer_name = null;
        //             $category_type = null;
        //         }
        //     }
        // }
        // dd($product_details);
        return view('userProducts.edit', compact('products', 'categories', 'manufacturers', 'product_details'));
    }


    //update product details
    public function update($id)
    {

        $user_id = Auth::user()->id;
        $this->msg_update = "Product was Successfully Updated";
        $updated = UserProduct::where('user_id', '=', $user_id)->where('product_id', '=', $id)->update(request()->except(['_token', '_method']));
        return redirect('/user/products/' . $id)->with('message_update', $this->msg_update);
    }
    //delete a product
    public function destroy($id)
    {
        $this->msg_del = "Product was Successfully deleted";
        // Session::flash('message_delete', $this->msg);
        UserProduct::where('user_id', Auth::user()->id)->where('product_id', '=', $id)->delete();
        return redirect('/user/products')->with('message_update', $this->msg_del);
    }
}
