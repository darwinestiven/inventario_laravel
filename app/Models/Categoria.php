<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'idCat';
    protected $fillable = ['idCat', 'nomCat', 'desCat'];
    public $timestamps = 'true';

    public function productos(){
        return $this->hasMany(Producto::class, 'idProd');
    }
}
