<?php

namespace App\Http\Controllers;
use App\Models\ProductosModel;
use Illuminate\Http\Request;
use App\Models\UsuariosModel;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    // Show the form for creating a new products.
    public function ShowFormProducts()
    {
        return view('admin.createForm');
    }
    // Show the form for creating a new user.
        public function ShowFormUser()
    {
        return view('admin.createUserForm');
    }

    // Show all products regular user.
    public function showAllProductshome(){
        $productos = ProductosModel::all();
        return view('allProducts', compact('productos'));
    }

    // Logica para crear un producto
    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string',
            'precio' => 'required|numeric',
            'genero' => 'required|string',
            'descripcion' => 'nullable|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'existencias' => 'required|integer'
        ]);

        $image = $request->file('img');
        $imageBinary = file_get_contents($image->getRealPath());

        ProductosModel::create([
            'nombre_producto' => $request->input('nombre'),
            'categoria' => $request->input('categoria'),
            'precio' => $request->input('precio'),
            'genero' => $request->input('genero'),
            'descripcion' => $request->input('descripcion'),
            'img' => $imageBinary,
            'existencias' => $request->input('existencias')
        ]);
        return redirect()->route('admin.home');
    }

    //Show all products in admin panel
    public function show(){
        $productos = ProductosModel::all();
        return view('admin.allproducts', compact('productos'));
    }

    //Show the form to edit a product
    public function edit($id){
        $productos = ProductosModel::find($id);
        return view('admin.editForm', compact('productos'));
    }
    // Update the product in the database
    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string',
            'precio' => 'required|numeric',
            'genero' => 'required|string',
            'descripcion' => 'nullable|string',
            'img' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'existencias' => 'required|integer'
        ]);

        $productos = ProductosModel::findorFail($id);
        $productos->nombre_producto = $request->input('nombre');
        $productos->categoria = $request->input('categoria');
        $productos->precio = $request->input('precio');
        $productos->genero = $request->input('genero');
        $productos->descripcion = $request->input('descripcion');
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageBinary = file_get_contents($image->getRealPath());
            $productos->img = $imageBinary;
        }
        $productos->existencias = $request->input('existencias');
        $productos->save();
        return redirect()->route('admin.home');
    }

    // Delete a product from the database
    public function delete($id){
        $productos = ProductosModel::find($id);
        $productos->delete();
        return redirect()->route('admin.showproducts');
    }
    // Show all users in the admin panel
    public function showUsers(){
        $users = UsuariosModel::all();
        return view('admin.allusers', compact('users'));
    }
    // Delete a user from the database
    public function deleteUser($id){
        $user = UsuariosModel::find($id);
        $user->delete();
        return redirect()->route('admin.showusers');
    }
    //Logica para crear un usuario
    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:30',
            'user_type' => 'required',
            'password' => 'nullable|min:8',
            'email' => 'required|email|unique:usuarios',
            'direccion' => 'nullable|string'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = UsuariosModel::create($validated);
        return redirect()->route('admin.showusers');
    }
    // Show the form to edit a user
    public function editUser($id){
        $user = UsuariosModel::findorFail($id);
        return view('admin.editUserForm', compact('user'));
    }
    // Update the user in the database
    public function updateUser(Request $request, $id){
        $validated = $request->validate([
            'username' => 'required|string|max:30',
            'user_type' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:usuarios,email,'.$id,
            'direccion' => 'nullable|string'
        ]);
        $user = UsuariosModel::findorFail($id);
        if (!empty($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
        } else {
        unset($validated['password']);
        }
        $user->update($validated);
        return redirect()->route('admin.showusers');
    }
    // Show each product in detail
    public function ShowEachProduct($id){
        $productos = ProductosModel::findorFail($id);
        return view('EachProduct', compact('productos'));
    }
    // Show products MAN
    public function ShowProductsMan(){
        $productos = ProductosModel::where('genero', 'Masculino')->get();
        return view('Man', compact('productos'));
    }
    // Show products WOMAN
    public function ShowProductsWoman(){
        $productos = ProductosModel::where('genero', 'Femenino')->get();
        return view('Woman', compact('productos'));
    }
}
