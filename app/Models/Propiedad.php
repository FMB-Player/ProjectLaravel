<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedad';

    protected $primaryKey = 'id_propiedad';

    protected $fillable = [
        'direccion',
        'isReservada',
        'id_tipo_propiedad',
        'id_propietario',
    ];

    // Relación muchos a uno / uno a uno con Tipo_Propiedad
    public function tipo_propiedad(){
        return $this->belongsTo(Tipo_Propiedad::class, 'id_tipo_propiedad', 'id_tipo_propiedad');
    }

    // Relación muchos a uno / uno a uno con Propietario
    public function propietario(){
        return $this->belongsTo(Propietario::class, 'id_propietario', 'id_propietario');
    }

    // Relación muchos a uno / uno a uno con Renta
    public function renta(){
        return $this->hasMany(Renta::class, 'id_propiedad', 'id_propiedad');
    }
}
