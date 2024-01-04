<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'idPro';
    protected $fillable = ['idPro', 'nomPro', 'correoPro', 'telPro', 'dirPro'];
    public $timestamps = 'true';

    public function existencias(){
        return $this->hasMany(Existencia::class, 'idExis');
    }
}
