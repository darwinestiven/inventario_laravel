<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('existencias', function (Blueprint $table) {
            $table->integer('idExis');
            $table->integer('cantIniExis');
            $table->integer('cantActExis');
            $table->integer('preComExis');
            $table->integer('preVenExis');
            $table->integer('categoria');
            $table->integer('producto');
            $table->integer('proveedor');
            $table->date('fecExis');
            $table->primary('idExis');
            $table->foreign('categoria')->references('idCat')->on('categoria');
            $table->foreign('producto')->references('idProd')->on('productos');
            $table->foreign('proveedor')->references('idPro')->on('proveedores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('existencias');
    }
};
