<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';  // Nombre de la tabla correcto

    // Campos que pueden ser llenados, de acuerdo con la estructura de la tabla
    protected $fillable = [
        'Correo', 
        'Nombre', 
        'Telefono', 
    ];
}
