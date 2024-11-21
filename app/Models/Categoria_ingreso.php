<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_ingreso extends Model
{
    use HasFactory;

    protected $table = 'categoria_ingreso';

    protected $primaryKey = 'id_ingreso';

    protected $fillable = [
        'nombre',
    ];

    // Relación uno a muchos en cliente
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id', 'id_ingreso');
    }
}
