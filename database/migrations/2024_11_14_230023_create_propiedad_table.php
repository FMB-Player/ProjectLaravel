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
        Schema::create('propiedad', function (Blueprint $table) {
            $table->id('id_propiedad');
            $table->string('direccion');
            $table->boolean('isReservada');
            $table->foreignId('id_tipo_propiedad')->constrained('tipo_propiedad');
            $table->foreignId('id_propietario')->constrained('propietario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedad');
    }
};
