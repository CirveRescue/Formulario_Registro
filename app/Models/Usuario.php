<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';  // Nombre de la tabla

    // Campos que pueden ser llenados
    protected $fillable = [
        'correo_electronico', 
        'apellido_paterno', 
        'apellido_materno', 
        'nombre', 
        'telefono', 
        'tipo_usuario', 
        'numero_control'
    ];

    // Relación: un usuario puede tener muchos vehículos
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'usuario_id');
    }

    // Relación: un usuario puede tener una información adicional
    public function informacionAdicional()
    {
        return $this->hasOne(InformacionAdicional::class, 'usuario_id');
    }
}
