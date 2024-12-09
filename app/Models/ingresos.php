<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingresos extends Model
{
    protected $fillable = ['nombre'];

    public static function createDefaultIngresos()
    {
        self::truncate();

        self::create(['nombre' => 'Alto']);
        self::create(['nombre' => 'Medio']);
        self::create(['nombre' => 'Bajo']);
    }


    public function clientes()
{
    return $this->HasMany(Clientes::class, 'categorias_ingresos', 'ingreso_id', 'cliente_id');
}
}
