<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="" name="username">
        <input type="" name="user_type">
        <input type="" name="password">
        <input type="" name="email"> 
        <input type="" name="direccion">
        <button type="submit">Register</button>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div>
                <h4>Validation Errors:</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>  
</body>
</html>