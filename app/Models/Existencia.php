<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    use HasFactory;

    protected $table = 'existencias';
    protected $primaryKey = 'idExis';
    protected $fillable = [
        'idExis',
        'cantIniExis',
        'cantActExis',
        'preComExis',
        'preVenExis',
        'categoria',
        'producto',
        'proveedor',
        'fecExis',
    ];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Categoria::class, 'categoria', 'idCat');
    }

    public function product()
    {
        return $this->belongsTo(Producto::class, 'producto', 'idProd');
    }

    public function supplier()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor', 'idPro');
    }
}
