<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuario = Usuario::all();
        return view('usuario.index', compact('usuario'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Correo' => 'required|email',  // Column name corrected
            'Nombre' => 'required',  // Column name corrected
            'Telefono' => 'required',  // Column name corrected
        ]);

        Usuario::create($request->only(['Correo', 'Nombre', 'Telefono']));  // Inserting only valid fields
        return redirect()->route('usuario.index')->with('success', 'Usuario creado exitosamente');
    }

    public function show(Usuario $usuario)
    {
        return view('usuario.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuario.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'Correo' => 'required|email',  // Column name corrected
            'Nombre' => 'required',  // Column name corrected
            'Telefono' => 'required',  // Column name corrected
        ]);

        $usuario->update($request->only(['Correo', 'Nombre', 'Telefono']));  // Updating only valid fields
        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuario.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
