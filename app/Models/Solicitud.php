<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    
    protected $table = 'solicitudes';

    
    protected $fillable = [
        'correo_electronico', 
        'apellido_paterno', 
        'apellido_materno', 
        'nombre', 
        'telefono', 
        'usuario', 
        'numero_control', 
        'tipo_vehiculo', 
        'marca', 
        'modelo', 
        'color', 
        'placa', 
        'foto_ine_frontal', 
        'foto_ine_trasera', 
        'foto_tarjeta_circulacion', 
        'foto_vehiculo'
    ];
}
