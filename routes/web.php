<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);
//route to store created products
Route::post('user/products/add', [App\Http\Controllers\ProductController::class, 'store']);

//Route to display all products for a user
Route::get('user/products', [App\Http\Controllers\UserProductController::class, 'index']);

//routes to add user product
Route::get('user/products/add', [App\Http\Controllers\UserProductController::class, 'create']);

//route to store users products
Route::post('user/products', [App\Http\Controllers\UserProductController::class, 'store']);

//route to edit user products
Route::get('user/products/{id}/edit', [App\Http\Controllers\UserProductController::class, 'edit']);

//route to excute the edit operation
Route::patch('user/products/{id}', [App\Http\Controllers\UserProductController::class, 'update']);

//route to show a product details
Route::get('user/products/{id}', [App\Http\Controllers\UserProductController::class, 'show']);

//route to delete user product
Route::delete('user/products/{id}', [App\Http\Controllers\UserProductController::class, 'destroy']);

//route to show user profile
Route::get('user/profile', [App\Http\Controllers\UserController::class, 'show']);
