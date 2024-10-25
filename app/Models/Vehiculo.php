<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    // Especificar la tabla asociada
    protected $table = 'vehiculo';

    // Definir la clave primaria
    protected $primaryKey = 'ID_Vehiculo';

    // Indicar que la clave primaria es de tipo autoincremental
    public $incrementing = true;

    // Especificar que la clave primaria no es un string
    protected $keyType = 'int';

    // Definir los campos que se pueden asignar en masa
    protected $fillable = [
        'ID_Usuario',
        'Placa',
        'Marca',
        'Modelo',
        'Color',
        'Tipo',
        'foto_ine_frontal',
        'foto_ine_trasera',
        'foto_tarjeta_circulacion',
        'foto_vehiculo'
    ];

    // Relaciones
    public function usuario()
    {
        // Relación de muchos a uno: un vehículo pertenece a un usuario
        return $this->belongsTo(Usuario::class, 'ID_Usuario', 'ID_Usuario');
    }
}
