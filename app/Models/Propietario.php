<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $table = 'propietario';

    protected $primaryKey = 'id_propietario';

    protected $fillable = [
        'nombre_propietario',
        'contacto_propietario',
    ];

    // Un propietario puede tener varias propiedades
    public function propiedad(){
        return $this->hasMany(Propiedad::class, 'id_propietario', 'id_propietario');
    }
}
