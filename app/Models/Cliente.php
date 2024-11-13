<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre_cliente',
        'tel_cliente',
    ];



    /**
     * Relación inversa muchos a uno con el modelo renta.
     * Un cliente puede tener muchas rentas.
     */
    public function renta()
    {
        return $this->hasMany(Renta::class, 'id_renta', 'id_renta');
    }
}
