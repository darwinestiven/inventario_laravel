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
        Schema::create('productos', function (Blueprint $table) {
            $table->integer('idProd');
            $table->string('nomProd',50);
            $table->integer('categoria');
            $table->string('detProd',50);
            $table->string('imagen')->nullable();
            $table->primary('idProd');
            $table->foreign('categoria')->references('idCat')->on('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
