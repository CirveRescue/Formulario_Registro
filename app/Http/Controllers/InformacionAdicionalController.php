<?php

namespace App\Http\Controllers;

use App\Models\InformacionAdicional;
use Illuminate\Http\Request;

class InformacionAdicionalController extends Controller
{
    public function index()
    {
        $informaciones = InformacionAdicional::all();
        return view('informacion_adicional.index', compact('informaciones'));
    }

    public function create()
    {
        return view('informacion_adicional.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'foto_ine_frente' => 'nullable',
            'foto_ine_trasera' => 'nullable',
            'foto_tarjeta_circulacion' => 'nullable',
            'foto_vehiculo' => 'nullable',
        ]);

        InformacionAdicional::create($request->all());
        return redirect()->route('informacion-adicional.index')->with('success', 'Información adicional creada exitosamente');
    }

    public function show(InformacionAdicional $informacionAdicional)
    {
        return view('informacion_adicional.show', compact('informacionAdicional'));
    }

    public function edit(InformacionAdicional $informacionAdicional)
    {
        return view('informacion_adicional.edit', compact('informacionAdicional'));
    }

    public function update(Request $request, InformacionAdicional $informacionAdicional)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'foto_ine_frente' => 'nullable',
            'foto_ine_trasera' => 'nullable',
            'foto_tarjeta_circulacion' => 'nullable',
            'foto_vehiculo' => 'nullable',
        ]);

        $informacionAdicional->update($request->all());
        return redirect()->route('informacion-adicional.index')->with('success', 'Información adicional actualizada exitosamente');
    }

    public function destroy(InformacionAdicional $informacionAdicional)
    {
        $informacionAdicional->delete();
        return redirect()->route('informacion-adicional.index')->with('success', 'Información adicional eliminada exitosamente');
    }
}
