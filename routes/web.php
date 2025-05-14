<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/register',[AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login',[AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/admin/home',[AuthController::class, 'showAdmin'])->name('admin.home');


Route::get('/products',[ProductController::class, 'index'])->name('products');
Route::get('/products',[ProductController::class, 'show'])->name('products');

Route::get('/', function () {
    return view('home');
})->name('home');