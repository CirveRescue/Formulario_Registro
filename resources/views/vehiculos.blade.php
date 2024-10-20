@extends('layouts.app')

@section('content')
    <h1>Lista de Vehículos</h1>
    <a href="{{ route('vehiculos.create') }}">Registrar Vehículo</a>

    <ul>
        @foreach($vehiculos as $vehiculo)
            <li>{{ $vehiculo->marca }} - {{ $vehiculo->modelo }} - <a href="{{ route('vehiculos.show', $vehiculo->id) }}">Ver</a></li>
        @endforeach
    </ul>
@endsection
