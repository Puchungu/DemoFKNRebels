<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <p>Please enter your email and password</p>
        <form class="form-login" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" value="{{ old('email') }}" placeholder="email">
            <input type="" name="password" placeholder="password">
            <a href="{{ route('register') }}">Don't have a account?</a>
            <button type="submit">Log in</button>
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
    </div>
</body>
</html>