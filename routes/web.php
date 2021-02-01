<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
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
Route::get('/', [App\Http\Controllers\UserProductController::class, 'index']);

//Route to display all products for a user
Route::get('user/products', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth');

//routes to add user product
Route::get('user/products/add', [App\Http\Controllers\ProductController::class, 'create'])->middleware('auth');

//route to store users products
Route::post('user/products', [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth');

//route to edit user products
Route::get('user/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth');

//route to excute the edit operation
Route::patch('user/products/{id}', [App\Http\Controllers\ProductController::class, 'update'])->middleware('auth');

//route to show a product details
Route::get('user/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->middleware('auth');

//route to delete user product
Route::delete('user/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth');

//route to show user profile
Route::get('user/profile', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//route to show a user
Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth');
//route for edit form for user details
Route::get('/user/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->middleware('auth');
//route to update user details
Route::put('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware('auth');
