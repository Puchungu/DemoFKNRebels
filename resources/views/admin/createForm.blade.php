<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    @vite('resources/css/app.css')
</head>

<body>
    <form class="form-editproduct" action="{{ route('create.products') }}" method="POST" enctype="multipart/form-data">
        <h1>Add New Producto</h1>
        @csrf

        <label>Product name:</label><br>
        <input type="text" id="nombre" name="nombre" required placeholder="Enter the product name"><br><br>

        <label>Product Category:</label><br>
        <input type="text" id="categoria" name="categoria" required
            placeholder="Enter the product category"></input><br><br>

        <label for="precio">Product Price:</label><br>
        <input type="number" step="0.01" id="precio" name="precio" required
            placeholder="Enter the product price"><br><br>

        <label for="precio">Product gender:</label><br>
        <input type="text" id="genero" name="genero" 
            placeholder="Enter the product gender"><br><br>
        
        <label for="descripcion">Product description:</label><br>
        <input type="text" id="descripcion" name="descripcion" 
            placeholder="Enter the product description"><br><br>

        <label for="img">Product imagen:</label><br>
        <input type="file" id="img" name="img" accept="image/*" required><br><br>

        <label for="stock">Product stock:</label><br>
        <input type="number" id="existencias" name="existencias" required placeholder="Enter the product stock"><br><br>

        <a href="{{route('admin.home') }}" class="button-link">Go back home</a>
        <button type="submit">Add new product</button>
        
    </form>
</body>

</html>