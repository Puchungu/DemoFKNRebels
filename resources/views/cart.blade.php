<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body class="cart">
    @include('header')
    @if(session('success'))
    <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 10px 20px; border-radius: 6px; margin: 20px auto; max-width: 400px; text-align: center;">
        {{ session('success') }}
        @if(session('comprobante'))
            <br>
            <a href="{{ session('comprobante') }}" download style="color: #155724; text-decoration: underline;">
                Descargar comprobante
            </a>
        @endif
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 10px 20px; border-radius: 6px; margin: 20px auto; max-width: 400px; text-align: center;">
        {{ session('error') }}
    </div>
    @endif
    <div class="cart-container">
        <h2>Carrito de Compras</h2>
        @php $total = 0; @endphp
        @if($cart && count($cart) > 0)
            @foreach($cart as $id => $item)
                @php
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal;
                @endphp
                <div class="cart-item">
                    <img src="data:image/{{ $item['imgType'] ?? 'jpeg' }};base64,{{ base64_encode($item['img']) }}" alt="Producto">
                    <div class="cart-info">
                        <div><strong>{{ $item['nombre'] }}</strong></div>
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="auto-submit-form">
                            @csrf
                            <input type="number"
                                name="cantidad"
                                value="{{ $item['cantidad'] }}"
                                min="1"
                                max="{{ \App\Models\ProductosModel::find($id)->existencias }}"
                                onchange="this.form.submit()"
                                style="width: 60px;">
                        </form>
                        <div>Precio: ${{ number_format($item['precio'], 2) }}</div>
                        <div>Subtotal: ${{ number_format($subtotal, 2) }}</div>
                    </div>
                    <div class="cart-actions">
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="cart-total">Total: ${{ number_format($total, 2) }}</div>
            <div style="text-align: right;">
               <form action="{{ route('cart.checkout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-buy">Finalizar compra</button>
                </form>
            </div>
        @else
            <div class="empty-message">Tu carrito está vacío.</div>
        @endif
    </div>
    @include('footer')
</body>
</html>
