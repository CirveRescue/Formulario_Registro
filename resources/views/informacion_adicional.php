@extends('layouts.app')

@section('content')
    <h1>Información Adicional</h1>
    <a href="{{ route('informacion-adicional.create') }}">Añadir Información</a>

    <ul>
        @foreach($informaciones as $info)
            <li>Usuario ID: {{ $info->usuario_id }} - Vehículo ID: {{ $info->vehiculo_id }} - <a href="{{ route('informacion-adicional.show', $info->id) }}">Ver</a></li>
        @endforeach
    </ul>
@endsection
