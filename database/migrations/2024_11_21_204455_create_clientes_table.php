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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_cli');
            $table->integer('edad');
            $table->boolean('seguro')->default(false);
            $table->string('telefono');
            $table->string('email');
            $table->date('fecha_ingreso');
            $table->foreignId('categoria_id')->constrained('ingresos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
