<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    use HasFactory;

    protected $table = 'renta';
    protected $primaryKey = 'id_renta';

    protected $fillable = [
        'fecha_renta',
        'precio_renta',
        'id_propiedad',
        'id_cliente',
    ];

    public function propiedad(){
        return $this->belongsTo(Propiedad::class, 'id_propiedad', 'id_propiedad');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
}
