<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Cambiar a Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory; // Opcional, si usas factories
use Illuminate\Notifications\Notifiable; // Opcional, si usas notificaciones

class UsuariosModel extends Authenticatable
{
    use HasFactory, Notifiable; // Opcional, si usas estas características

    protected $table = 'usuarios';

    protected $fillable = [
        'username',
        'user_type',
        'password',
        'email',
        'direccion',
        'metodo_pago'
    ];

    public function pedidos()
    {
        return $this->hasMany(pedidos_model::class, 'id_usuarios');
    }

}
