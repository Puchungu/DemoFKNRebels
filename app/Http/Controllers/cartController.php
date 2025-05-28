<?php

namespace App\Http\Controllers;
use App\Models\ProductosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\PedidosModel;

class cartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $producto = ProductosModel::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
        } else {
            $cart[$id] = [
                "nombre" => $producto->nombre_producto,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "img" => $producto->img,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function showCart()
    {
        $cart = session('cart');
        return view('cart', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function finalizarCompra()
    {
        $cart = session('cart');
        if (!$cart || count($cart) == 0) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        foreach ($cart as $id => $item) {
            $producto = ProductosModel::find($id);
            if (!$producto || $producto->existencias < $item['cantidad']) {
                return redirect()->back()->with('error', "No hay suficiente stock para {$item['nombre']}.");
            }
        }

        $total = 0;
        $detalle = "";
        foreach ($cart as $id => $item) {
            $producto = ProductosModel::find($id);
            $producto->existencias -= $item['cantidad'];
            if ($producto->existencias < 0) {
                $producto->existencias = 0;
            }
            $producto->save();

            $subtotal = $item['precio'] * $item['cantidad'];
            $total += $subtotal;
            $detalle .= "{$item['nombre']} x{$item['cantidad']} - $" . number_format($subtotal, 2) . "\n";
        }

        $pedido = PedidosModel::create([
            'id_usuarios' => Auth::id(),
            'doc_detalle' => '', 
            'total_USD' => $total,
            'Nota' => 'Pedido realizado desde la web',
        ]);

        $filename = "pedido_{$pedido->id}.txt";
        $contenido = "Pedido #{$pedido->id}\nUsuario: " . Auth::user()->name . "\n\nDetalles:\n$detalle\nTotal: $" . number_format($total, 2);
        Storage::disk('public')->put("pedidos/{$filename}", $contenido);

        $pedido->update(['doc_detalle' => "pedidos/{$filename}"]);

        // Limpiar el carrito
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', '¡Compra finalizada! Puedes descargar tu comprobante.');
    }
}


