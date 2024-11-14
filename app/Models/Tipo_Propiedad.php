<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Propiedad extends Model
{
    use HasFactory;

    protected $table = 'tipo_propiedad';
    
    protected $primaryKey = 'id_tipo_propiedad';

    protected $fillable =[
        'tipo_propiedad',
    ];

    // Relación muchos a uno en Propiedad
    public function propiedad()
    {
        return $this->hasMany(Propiedad::class, 'id_tipo_propiedad','id_tipo_propiedad');
    }
}
