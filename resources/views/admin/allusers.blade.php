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
                <th>Username</th>
                <th>User_Type</th>
                <th>Password</th>
                <th>Email</th>
                <th>Direccion</th>
                <th>Metodo De Pago</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->user_type}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->direccion}}</td>
                <td>{{$user->metodo_pago}}</td> 
                <td>
                <div class="button-group">
                    <a href="{{route('edit.user',$user->id)}}"><button type="button">Editar</button></a>
                    <form action="{{ route('delete.user', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>