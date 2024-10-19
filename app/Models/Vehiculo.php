<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos'; // Nombre de la tabla

    // Campos que pueden ser llenados
    protected $fillable = [
        'usuario_id', 
        'tipo_vehiculo', 
        'marca', 
        'modelo', 
        'color', 
        'placa'
    ];

    // Relación inversa: un vehículo pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Relación: un vehículo puede tener una información adicional
    public function informacionAdicional()
    {
        return $this->hasOne(InformacionAdicional::class, 'vehiculo_id');
    }
}
