<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All products</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <a href="{{ route('admin.home') }}">
        <button type="button" class="buttonadmin">Regresar al Admin Home</button>
    </a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Gender</th>
                <th>Description</th>
                <th>stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{$producto->nombre_producto}}</td>
                <td>{{$producto->categoria}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->genero}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->existencias}}</td>  
                <td>
                <div class="button-group">
                    <a href="{{route('edit.products',$producto->id)}}"><button type="button">Editar</button></a>
                    <form action="{{ route('delete.products', $producto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>  
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>