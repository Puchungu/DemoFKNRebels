<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosModel extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'id_usuarios',
        'doc_detalle',
        'total_USD',
        'Nota'
    ];

    public function usuario()
    {
        return $this->belongsTo(usuarios_model::class, 'id_usuarios');
    }
}