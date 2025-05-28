<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $productos->nombre_producto }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="product-page">
    @include('header')
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="product-container">
        <div class="product-img">
            <img src="data:image/{{ $productos->imgType }};base64,{{ base64_encode($productos->img) }}" alt="Imagen del Producto">
        </div>
        <div class="product-info">
            <div class="product-title">{{ $productos->nombre_producto }}</div>
            <div class="product-category">{{ $productos->categoria }}</div>
            <div class="product-price">${{ number_format($productos->precio, 2) }}</div>
            <div class="product-description">{{ $productos->descripcion }}</div>
            <div class="product-meta">Género: {{ $productos->genero }}</div>
            <div class="product-meta">Existencias: {{ $productos->existencias }}</div>
            <form action="{{ route('cart.add', $productos->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-buy">Agregar al carrito</button>
                
            </form>
        </div>
    </div>
    @include('footer')
</body>
</html>