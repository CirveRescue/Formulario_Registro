<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $matricula = $request->input('matricula');

        // Validar si se ingresó matrícula
        if (empty($matricula)) {
            return redirect()->back()->with('error', 'Por favor ingresa una matrícula.');
        }

        // Llamada a la API
        $response = Http::withHeaders([
            'client_id' => 'd99ffee5cf7acda86e241b396989020d',
            'client_secret' => '1a06d429a825853dd81b051524280fd293b56c51d5a567ad7353c0f71d3c312f',
        ])->get("https://sii.tsj.mx:3002/validacion/alumno/{$matricula}");

        // Verificar la respuesta de la API
        if ($response->failed() || $response->json('error')) {
            return redirect()->back()->with('error', 'Matrícula no válida.');
        }

        $data = $response->json();
        // dd($response->json());
        // Guardar información del alumno en sesión
        session([
            'nombre' => $data['nombre'],
            'campus' => $data['campus'],
            'semestre' => $data['semestre'],
            'carrera' => $data['carrera'],
            'status' => $data['status'],
            'matricula' => $data['matricula'],
        ]);
        if ($data['status'] === 'Vigente')
        {
        // Redirigir a una página de bienvenida o dashboard
            return redirect()->route('solicitud')->with('data', $data);  // Pasando $data a la vista
        }
        else
        {
            return redirect()->back()->with('error', 'El alumno con Matricula:'.$data['matricula'].''.'No esta Vigente');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('error', 'Has cerrado sesión.');
    }
}
