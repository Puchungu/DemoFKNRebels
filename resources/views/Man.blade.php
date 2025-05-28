<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man</title>
</head>
<body>
    @include('header')
    <section class="hero">
    <h1>All Products</h1>
    <p>Unleash your style. Explore every FKN piece we’ve crafted for rebels like you.</p>
        <div class="product-list">
            @foreach ($productos as $producto)
        <a href="{{ route('show.product', $producto->id) }}">
            <div class="product-card">
                <img src="data:image/{{ $producto->imgType }};base64,{{ base64_encode($producto->img) }}" alt="Imagen del Producto">
                <h2>{{ $producto->nombre_producto }}</h2>
                <p>${{ number_format($producto->precio, 2) }}</p>
            </div>
        </a>
            @endforeach
        </div>
    </section>

    @include('footer')
</body>
</html>