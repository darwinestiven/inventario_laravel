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
        Schema::table('facturacion', function (Blueprint $table) {
            $table->string('categoria')->nullable();
            $table->string('producto')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('precio')->nullable();
            $table->string('total')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facturacion', function (Blueprint $table) {
            $table->dropColumn('categoria');
            $table->dropColumn('producto');
            $table->dropColumn('cantidad');
            $table->dropColumn('precio');
            $table->dropColumn('total');
        });
    }
};
