<?php

namespace App\Http\Controllers;

use App\Models\Products;

use App\Models\User;
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
            ->select('products.*')->paginate(4);
        return view('userProducts.index', compact('products'));
    }
    //create  new product in DB
    public function create()
    {
        $conditions = ProductConditions::all();
        $product = new Products();
        return view('userProducts.create', compact('conditions', 'product'));
    }

    //stre product
    public function store()
    {
        $data = $this->validateFields();
        $product = Products::create($data);
        $this->storeImage($product);
        $product_id = $product->id;
        $created = DB::table('user_products')->insert([
            'user_id' => Auth::user()->id,
            'product_id' => $product_id
        ]);

        return redirect('/user/products')->with("message", "Product was Successfully Created");
    }
    ///show  product detail
    public function show($id)
    {
        $details = Products::findOrFail($id);
        $owner = $this->productOwner($id);
        //get details of owner
        for ($i = 0; $i < 1; $i++) {
            $owner_details = $owner[$i];
        }
        return view('userProducts.show', compact('details', 'owner_details'));
    }
    //get owner of product
    public  function productOwner($id)
    {
        $owner = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->where('products.id', '=', $id)
            ->select('users.name', 'users.email', 'users.telephone')->get();
        return $owner;
    }
    //edit product
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $conditions = ProductConditions::all();
        return view('userProducts.edit', compact('conditions', 'product'));
    }
    //update product
    public function update($id)
    {
        $data = $this->validateFields();
        $updated = Products::findOrFail($id)->update($data);
        return redirect('/user/products/' . $id)->with('message', "Product was Successfully Updated");
    }
    //delete product
    public function destroy($id)
    {
        $deleted = Products::findOrFail($id)->delete();
        return redirect('/user/products')->with('message_delete', 'Product Successfully deleted');
    }
    //validate field
    private function validateFields()
    {
        if (request()->hasFile('image')) {
            $data = request()->validate([
                'product_name' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'product_condition_id' => 'required',
                'discount' => 'numeric',
                'in_stocked' => 'numeric',
                'service' => 'numeric',
                'published' => 'numeric',
                'image' => 'image|max:5000'
            ]);
        } else {
            $data = request()->validate([
                'product_name' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'product_condition_id' => 'required',
                'discount' => 'numeric',
                'in_stocked' => 'numeric',
                'service' => 'numeric',
                'published' => 'numeric',

            ]);
        }
        return $data;
    }
    // //store image
    private function storeImage($product)
    {
        if (request()->has('image')) {
            $product->update([
                'image' => request()->image->store('img', 'public'),
            ]);
        }
    }
}
