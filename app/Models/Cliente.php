<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_cli',
        'telefono',
        'email',
        'fecha_ingreso',
        'edad',
        'seguro',
        'id_ingreso',
    ];

    // Relación muchos a uno en categoria_ingreso
    // Un cliente pertenece a una categoría
    public function categoria_ingreso()
    {
        return $this->belongsTo(Categoria_ingreso::class, 'id_ingreso');
    }
}
