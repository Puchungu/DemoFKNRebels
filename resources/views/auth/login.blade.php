<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}">
        <input type="" name="password">
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
</body>
</html>