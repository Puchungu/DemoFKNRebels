<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosModel extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto',
        'categoria',
        'precio',
        'genero',
        'descripcion',
        'img',
        'existencias'
    ];
}
