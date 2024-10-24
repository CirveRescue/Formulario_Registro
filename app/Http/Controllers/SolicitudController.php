<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'Correo' => 'required|email',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'usuario' => 'required|in:Empleado,Alumno,Kioskos',
            'numero_control' => $request->usuario == 'Alumno' ? 'required|string|max:20' : 'nullable',
        ]);

        // Concatenar nombre completo
        $nombreCompleto = $request->nombre . ' ' . $request->apellido_paterno . ' ' . $request->apellido_materno;

        // Guardar el usuario con el nombre completo concatenado
        $usuario = Usuario::create([
            'Correo' => $request->Correo,
            'Nombre' => $nombreCompleto,  // Nombre completo concatenado
            'telefono' => $request->telefono,
            'tipo_usuario' => $request->usuario,
            'numero_control' => $request->numero_control,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Solicitud enviada exitosamente.');
    }
}
