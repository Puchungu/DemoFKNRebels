<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\cartController;

Route::get('/register',[AuthController::class, 'showRegister'])->name('show.register'); // Show the registration form
Route::get('/login',[AuthController::class, 'showLogin'])->name('show.login'); // Show the login form
Route::post('/register',[AuthController::class, 'register'])->name('register');  // Register a new user
Route::post('/login',[AuthController::class, 'login'])->name('login'); // Login a user
Route::post('/logout',[AuthController::class, 'logout'])->name('logout'); // Logout a user
Route::get('/products/create',[ProductController::class, 'ShowFormProducts'])->name('show.formproducts'); //Show the form to create a product
Route::get('/users/create',[ProductController::class, 'ShowFormUser'])->name('show.formuser'); // Show the form to create a user
Route::get('/admin/home',[AuthController::class, 'showAdmin'])->name('admin.home'); // Show the admin home page
Route::get('/products',[ProductController::class, 'show'])->name('admin.showproducts'); // Show all products
Route::get('/users',[ProductController::class, 'showUsers'])->name('admin.showusers'); // Show all users
Route::post('/products/create',[ProductController::class, 'create'])->name('create.products'); // Create a product
Route::get('/products/edit/{id}',[ProductController::class, 'edit'])->name('edit.products'); // Show the form to edit a product
Route::get('/users/edit/{id}',[ProductController::class, 'editUser'])->name('edit.user'); // Show the form to edit a user
Route::put('/users/edit/{id}',[ProductController::class, 'updateUser'])->name('update.user'); // Update a user
Route::put('/products/edit/{id}',[ProductController::class, 'update'])->name('update.products'); // Update a product
Route::delete('/products/delete/{id}',[ProductController::class, 'delete'])->name('delete.products'); // Delete a product
Route::delete('/users/delete/{id}',[ProductController::class, 'deleteUser'])->name('delete.user'); // Delete a user
Route::post('/register/user/admin',[ProductController::class, 'createUser'])->name('admin.register'); // Create a user
Route::get('/products/home',[ProductController::class, 'showAllProductshome'])->name('home.products'); // Show all products in the home page
Route::get('/product/{id}',[ProductController::class, 'ShowEachProduct'])->name('show.product'); // Show a single product
Route::get('/products/man',[ProductController::class, 'ShowProductsMan'])->name('show.manproducts'); // Show product man
Route::get('/products/woman',[ProductController::class, 'ShowProductsWoman'])->name('show.Womanproducts'); // Show product Woman
Route::post('/cart/add/{id}', [cartController::class, 'addToCart'])->name('cart.add'); // Add a product to the cart
Route::get('/cart', [cartController::class, 'showCart'])->name('cart.show'); // Show the cart
Route::post('/cart/remove/{id}', [cartController::class, 'removeFromCart'])->name('cart.remove'); // Remove a product from the cart
Route::post('/cart/checkout', [cartController::class, 'finalizarCompra'])->name('cart.checkout'); // Finalize the purchase
Route::get('/', function () { return view('home');})->name('home');  // Show the home page
Route::get('/store', function () { return view('stores');})->name('store'); // Show the store page
Route::get('/collections', function () { return view('collections');})->name('collections'); // Show the about page

