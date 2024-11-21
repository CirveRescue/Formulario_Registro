<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Vehiculo;
use App\Models\InformacionAdicional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;


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
            'foto_ine_frontal' => 'nullable|image|max:10240',
            'foto_ine_trasera' => 'nullable|image|max:10240',
            'foto_tarjeta_circulacion' => 'nullable|image|max:10240',
            'foto_vehiculo' => 'nullable|image|max:10240',
        ]);

        // Concatenar nombre completo
        $nombreCompleto = $request->nombre . ' ' . $request->apellido_paterno . ' ' . $request->apellido_materno;

        //Verificar si el correo ya está registrado
        $Valida_Placa = Vehiculo::where('Placa', $request->input('Placa'))->first();
        $Usuario = Usuario::where('ID_Usuario', $Valida_Placa->ID_Usuario)->first();
        if ($Valida_Placa) {
            return redirect()->back()->with('error', 'La placa ya se encuentra registrada al Usuario:'.' '. $Usuario->Nombre);
        }

        // Guardar el usuario con el nombre completo concatenado
        $usuario = Usuario::create([
            'Correo' => $request->Correo,
            'Nombre' => $nombreCompleto,
            'Telefono' => $request->telefono,
        ]);

        // Guardar el vehículo
        $vehiculo = Vehiculo::create([
            'ID_Usuario' => $usuario->id,
            'Placa' => $request->input('Placa') ?? null,
            'Modelo' => $request->modelo,
            'Color' => $request->color,
            'Tipo' => $request->tipo_vehiculo,
        ]);
 // Subir y encriptar archivos
        $fotoIneFrontal = $request->file('foto_ine_frontal')
            ? $this->encryptAndStoreFile($request->file('foto_ine_frontal'), 'foto_ine_frontal')
            : null;
        $fotoIneTrasera = $request->file('foto_ine_trasera')
            ? $this->encryptAndStoreFile($request->file('foto_ine_trasera'), 'foto_ine_trasera')
            : null;
        $fotoTarjetaCirculacion = $request->file('foto_tarjeta_circulacion')
            ? $this->encryptAndStoreFile($request->file('foto_tarjeta_circulacion'), 'foto_tarjeta_circulacion')
            : null;
        $fotoVehiculo = $request->file('foto_vehiculo')
            ? $this->encryptAndStoreFile($request->file('foto_vehiculo'), 'foto_vehiculo')
            : null;

        // Guardar la información adicional
        InformacionAdicional::create([
            'usuario_id' => $usuario->id,
            'vehiculo_id' => $vehiculo->id,
            'numero_nomina' => $request->input('numero_nomina') ?? null,
            'numero_control' => $request->input('numero_control') ?? null,
            'declara_informacion_veridica' => $request->input('declara_informacion_veridica') ?? null,
            'cuentas_con_candado' => $request->input('cuentas_con_candado') ?? null,
            'nombre_local' => $request->input('nombre_local') ?? null,
            'foto_ine_frente' => $fotoIneFrontal,
            'foto_ine_trasera' => $fotoIneTrasera,
            'foto_tarjeta_circulacion' => $fotoTarjetaCirculacion,
            'foto_vehiculo' => $fotoVehiculo,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Solicitud enviada exitosamente.');
    }

    // Método para encriptar y almacenar archivos
    private function encryptAndStoreFile($file, $fileName)
    {
        // Leer el contenido del archivo
        $fileContent = file_get_contents($file);

        // Encriptar el contenido del archivo
        $encryptedContent = Crypt::encrypt($fileContent);

        // Definir la ruta para almacenar el archivo
        $path = 'uploads/' . uniqid() . '_' . $fileName . '.enc';

        // Guardar el archivo encriptado en el almacenamiento local
        Storage::put($path, $encryptedContent);

        // Retornar la ruta relativa para almacenar en la base de datos
        return $path;
    }
}
