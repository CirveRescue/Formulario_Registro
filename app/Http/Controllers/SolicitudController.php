<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Vehiculo;
use App\Models\InformacionAdicional;

class SolicitudController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'correo_electronico' => 'required|email',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'usuario' => 'required|in:Empleado,Alumno,Kioskos',
            'numero_control' => $request->usuario == 'Alumno' ? 'required|string|max:20' : 'nullable',
            'tipo_vehiculo' => 'required|in:Bicicleta,Motocicleta,Scooter eléctrico,Automóvil',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
            'placa' => 'nullable|string|max:20',
            'foto_ine_frontal' => 'nullable|image|max:10240',
            'foto_ine_trasera' => 'nullable|image|max:10240',
            'foto_tarjeta_circulacion' => 'nullable|image|max:10240',
            'foto_vehiculo' => 'nullable|image|max:10240',
        ]);

        // Subir archivos opcionales
        $fotoIneFrontal = $request->file('foto_ine_frontal') ? $request->file('foto_ine_frontal')->store('uploads', 'public') : null;
        $fotoIneTrasera = $request->file('foto_ine_trasera') ? $request->file('foto_ine_trasera')->store('uploads', 'public') : null;
        $fotoTarjetaCirculacion = $request->file('foto_tarjeta_circulacion') ? $request->file('foto_tarjeta_circulacion')->store('uploads', 'public') : null;
        $fotoVehiculo = $request->file('foto_vehiculo') ? $request->file('foto_vehiculo')->store('uploads', 'public') : null;

        // Guardar el usuario
        $usuario = Usuario::create([
            'correo_electronico' => $request->correo_electronico,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'tipo_usuario' => $request->usuario,
            'numero_control' => $request->numero_control,
        ]);

        // Guardar el vehículo
        $vehiculo = Vehiculo::create([
            'usuario_id' => $usuario->id, // Relacionar con el usuario
            'tipo_vehiculo' => $request->tipo_vehiculo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'color' => $request->color,
            'placa' => $request->placa,
        ]);

        // Guardar la información adicional
        InformacionAdicional::create([
            'usuario_id' => $usuario->id,
            'vehiculo_id' => $vehiculo->id, // Relacionar con el vehículo
            'foto_ine_frente' => $fotoIneFrontal,
            'foto_ine_trasera' => $fotoIneTrasera,
            'foto_tarjeta_circulacion' => $fotoTarjetaCirculacion,
            'foto_vehiculo' => $fotoVehiculo,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Solicitud enviada exitosamente.');
    }
}
