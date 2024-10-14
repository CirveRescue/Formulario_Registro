<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud Vehicular</title>
</head>
<body>
    <h1>Formulario de Solicitud y Entrega de Candado Vehicular</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('solicitud.store') }}" method="POST">
        @csrf
        <label for="correo_electronico">Correo electrónico:</label>
        <input type="email" id="correo_electronico" name="correo_electronico" value="{{ old('correo_electronico') }}" required><br>

        <label for="apellido_paterno">Apellido paterno:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required><br>

        <label for="apellido_materno">Apellido materno:</label>
        <input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}" required><br>

        <label for="nombre">Nombre(s):</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" required><br>

        <label for="usuario">Usuario:</label><br>
        <input type="radio" id="empleado" name="usuario" value="Empleado" {{ old('usuario') == 'Empleado' ? 'checked' : '' }}>
        <label for="empleado">Empleado</label><br>
        <input type="radio" id="alumno" name="usuario" value="Alumno" {{ old('usuario') == 'Alumno' ? 'checked' : '' }}>
        <label for="alumno">Alumno</label><br>
        <input type="radio" id="kioskos" name="usuario" value="Kioskos" {{ old('usuario') == 'Kioskos' ? 'checked' : '' }}>
        <label for="kioskos">Kioskos</label><br>

        <button type="submit">Enviar solicitud</button>
    </form>
</body>
</html>
