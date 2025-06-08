<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="form-container">
        <h1>Create New User</h1>
        <p>Please fill the information below</p>
        <form class="form-register" action="{{ route('admin.register') }}" method="POST">
            @csrf
            <input type="" name="username" placeholder="Username">
            <input type="" name="password" placeholder="Password">
            <input type="" name="email" placeholder="Email"> 
            <input type="" name="direccion" placeholder="Direccion">
            <select name='user_type'>
                <option value="admin">Admin</option>
                <option value="regular">Regular</option>
            </select>
            <a href="{{ route('admin.home') }}">Go back to home</a>
            <button type="submit">Register</button>
            <!-- Display validation errors -->
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form> 
    </div>
</body>
</html>