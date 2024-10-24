<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    // Updated $fillable fields to match the correct database structure
    protected $fillable = [
        'Correo',  // Assuming you meant this field to be consistent
        'Nombre',  // Consistent with the user table structure
        'Telefono',  // Consistent with the user table structure
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
