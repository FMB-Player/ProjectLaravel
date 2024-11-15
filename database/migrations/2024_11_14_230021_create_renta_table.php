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
        Schema::create('renta', function (Blueprint $table) {
            $table->id('id_renta');
            $table->date('fecha_renta');
            $table->decimal('precio_renta');
            $table->foreignId('id_propiedad')->constrained('propiedad');
            $table->foreignId('id_cliente')->constrained('cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renta');
    }
};
