<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionAdicional extends Model
{
    use HasFactory;

    // Especificar la tabla asociada
    protected $table = 'informacion_adicional';

    // Especificar la clave primaria
    protected $primaryKey = 'id';

    // Indicar que la clave primaria es de tipo autoincremental
    public $incrementing = true;

    // Especificar que la clave primaria no es un string
    protected $keyType = 'int';

    // Habilitar la opción de timestamps
    public $timestamps = true;

    // Definir los campos que se pueden asignar en masa
    protected $fillable = [
        'usuario_id',
        'vehiculo_id',
        'numero_nomina',
        'numero_control',
        'correo_electronico_alternativo',
        'declara_informacion_veridica',
        'cuentas_con_candado',
        'nombre_local',
        'foto_ine_frente',
        'foto_ine_trasera',
        'foto_tarjeta_circulacion',
    ];

    // Relación con el modelo Usuario (muchos a uno)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    // Relación con el modelo Vehiculo (muchos a uno)
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id', 'id');
    }
}
