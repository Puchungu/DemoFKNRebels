<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    @include('header')
    @auth
        <h2> Hi there, {{Auth::user()->username}}</h2>
    @endauth
</body>
</html>