<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Vehiculo;
use App\Models\InformacionAdicional;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'Correo' => 'required|email',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'usuario' => 'required|string',
            'numero_control' => 'nullable|string',
            'numero_nomina' => 'nullable|string',
            'tipo_vehiculo' => 'required',
            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
            'color' => 'nullable|string',
            'foto_ine_frontal' => 'nullable|image',
            'foto_ine_trasera' => 'nullable|image',
            'foto_tarjeta_circulacion' => 'nullable|image',
            'foto_vehiculo' => 'nullable|image',
        ]);

        // Concatenar nombre completo
        $nombreCompleto = $request->nombre . ' ' . $request->apellido_paterno . ' ' . $request->apellido_materno;

        $Valida_Correo = Usuario::where('Correo', $request->Correo)->first();

        if($Valida_Correo)
        {
            return redirect()->back()->with('error', 'El correo ya se encuentra registrado');
        }

        // Guardar el usuario con el nombre completo concatenado
        $usuario = Usuario::create([
            'Correo' => $request->Correo,
            'Nombre' => $nombreCompleto,  // Nombre completo concatenado
            'Telefono' => $request->telefono,
        ]);
        $vehiculo = Vehiculo::create([
            'ID_Usuario' => $usuario->id,
            'Placa' => $request->input('Placa') ?? null,  // Asignar null si no se envía el campo
            'Modelo' => $request->modelo,
            'Color' => $request->color,
            'Tipo' => $request->tipo_vehiculo,
        ]);

        InformacionAdicional::create([
            'usuario_id' => $usuario->id,
            'vehiculo_id' => $vehiculo->id,
            'numero_nomina' => $request->input('numero_nomina') ?? null,
            'numero_control' => $request->input('numero_control') ?? null,
            'declara_informacion_veridica' => $request->input('declara_informacion_veridica') ?? null,
            'cuentas_con_candado' => $request->input('cuentas_con_candado') ?? null,
            'nombre_local' => $request->input('nombre_local') ?? null,

        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Solicitud enviada exitosamente.');
    }
}
