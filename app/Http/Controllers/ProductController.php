<?php

namespace App\Http\Controllers;
use App\Models\ProductosModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('allProducts');
    }

    public function show(){
        $productos = ProductosModel::all();
        return view('allProducts', compact('productos'));
    }
}
