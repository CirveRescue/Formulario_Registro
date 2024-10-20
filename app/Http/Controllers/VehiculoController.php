<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo_vehiculo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'placa' => 'required',
        ]);

        Vehiculo::create($request->all());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creado exitosamente');
    }

    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo_vehiculo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'placa' => 'required',
        ]);

        $vehiculo->update($request->all());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado exitosamente');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado exitosamente');
    }
}
