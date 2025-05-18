<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    @vite('resources/css/app.css')
</head>

<body>
    <form class="form-editproduct" action="{{ route('update.products', $productos->id) }}" method="POST" enctype="multipart/form-data">
        <h1>Update Product, {{$productos->nombre_producto}}</h1>
        @csrf
        @method('PUT')

        <label>Product name:</label><br>
        <input type="text" id="nombre" name="nombre" required placeholder="Enter the product name" value="{{$productos->nombre_producto}}"><br><br>

        <label>Product Category:</label><br>
        <input type="text" id="categoria" name="categoria" required
            placeholder="Enter the product category" value="{{$productos->categoria}}"></input><br><br>

        <label for="precio">Product Price:</label><br>
        <input type="number" step="0.01" id="precio" name="precio" required
            placeholder="Enter the product price" value="{{$productos->precio}}"><br><br>

        <label for="precio">Product gender:</label><br>
        <input type="text" id="genero" name="genero" required
            placeholder="Enter the product gender" value="{{$productos->genero}}"><br><br>

        <label for="descripcion">Product description:</label><br>
        <input type="text" id="descripcion" name="descripcion" required
            placeholder="Enter the product description" value="{{$productos->descripcion}}"><br><br>

        <label for="img">Product imagen:</label><br>
        <input type="file" id="img" name="img" accept="image/*" required><br><br>

        <label for="stock">Product stock:</label><br>
        <input type="number" id="existencias" name="existencias" required placeholder="Enter the product stock" value="{{$productos->existencias}}"><br><br>

        <a href="{{route('admin.home') }}" class="button-link">Go back home</a>
        <button type="submit">Update</button>
    </form>
</body>

</html>