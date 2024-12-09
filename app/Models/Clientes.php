<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_cli',
        'edad',
        'seguro',
        'telefono',
        'email',
        'fecha_ingreso',
        'id_ingreso',
    ];

    public function ingresos()
{
    return $this->belongsTo(Ingresos::class, 'categorias_ingresos', 'cliente_id', 'ingreso_id');
}
}
