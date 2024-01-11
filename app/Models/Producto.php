<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'idProd';
    protected $fillable = ['idProd', 'nomProd', 'categoria', 'detProd','imagen'];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Categoria::class, 'categoria', 'idCat');
    }

    public function categoriaRelacion()
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }

    public function existencia()
    {
        return $this->hasOne(Existencia::class, 'producto', 'idProd');
    }
}