<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        DB::table('ingresos')->insert([
            ['nombre' => 'Alto'],
            ['nombre' => 'Medio'],
            ['nombre' => 'Bajo'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
};
