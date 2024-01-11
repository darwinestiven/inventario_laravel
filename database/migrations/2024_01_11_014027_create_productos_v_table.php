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
        Schema::create('productos_v', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_factura')->nullable();
            $table->string('categoria')->nullable();
            $table->string('producto')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('precio', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_v');
    }
};
