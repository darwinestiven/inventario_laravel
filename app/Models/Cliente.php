<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'idCli';
    protected $fillable = ['idCli', 'nomCli', 'correoCli', 'telCli', 'dirCli'];
    public $timestamps = 'true';

    public function facturacion(){
        return $this->hasMany(Facturacion::class, 'idFac');
    }
}
