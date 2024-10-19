<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionAdicional extends Model
{
    use HasFactory;

    protected $table = 'informacion_adicional'; // Nombre de la tabla

    // Campos que pueden ser llenados
    protected $fillable = [
        'usuario_id', 
        'vehiculo_id', 
        'foto_ine_frente', 
        'foto_ine_trasera', 
        'foto_tarjeta_circulacion', 
        'foto_vehiculo'
    ];

    // Relación inversa: la información adicional pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Relación inversa: la información adicional pertenece a un vehículo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }
}
