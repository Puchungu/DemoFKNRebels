<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>This is a simple home page for the application.</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
    <button>Logout</button>
    </form>
</body>
</html>