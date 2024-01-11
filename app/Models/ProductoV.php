<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoV extends Model
{
    use HasFactory;

    protected $table = 'productos_v'; // Asegúrate de que el nombre de la tabla esté correctamente definido

    protected $fillable = [
        'id_factura',
        'categoria',
        'producto',
        'cantidad',
        'precio',
        'total'
    ];

    
}
