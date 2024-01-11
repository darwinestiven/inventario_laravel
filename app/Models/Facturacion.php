<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $table = 'facturacion';
    protected $primaryKey = 'idFac';
    protected $fillable = ['cliente', 'idFac', 'fecFac', 'montoToFac', 'categoria', 'producto', 'cantidad', 'precio', 'total'];

    public $timestamps = 'true';

    public function client(){
        return $this->belongsTo(Cliente::class, 'cliente', 'idCli');
    }
}
