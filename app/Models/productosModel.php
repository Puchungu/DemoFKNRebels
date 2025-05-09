<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productos_model extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto',
        'categoria',
        'precio',
        'genero',
        'existencias'
    ];
}
