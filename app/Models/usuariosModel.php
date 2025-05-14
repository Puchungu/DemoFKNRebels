<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Notifications\Notifiable; 

class UsuariosModel extends Authenticatable
{
    use HasFactory, Notifiable; 

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
