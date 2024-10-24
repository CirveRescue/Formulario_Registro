@extends('layouts.app')

@section('title', 'Formulario de Solicitud Vehicular')

@section('content')
    <!-- Mensaje de éxito -->
    @if (session('success'))
    <div class="alert alert-success text-center">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
    </div>
    @endif

    <!-- Sección de datos personales -->
    <form action="{{ route('solicitud.store') }}" method="POST" enctype="multipart/form-data" class="form-section needs-validation" novalidate style="max-width: 700px; margin: auto;">
        @csrf
        <h2 class="mb-4" style="font-size: 1.5rem;">FORMULARIO DE SOLICITUD VEHICULAR</h2>

        <div class="mb-2 position-relative">
            <label for="Correo" class="form-label" style="font-size: 0.9rem;">Correo electrónico <span class="required-mark">*</span></label>
            <input type="email" class="form-control form-control-sm" id="Correo" name="Correo" value="{{ old('Correo') }}" required>
            <div class="invalid-feedback">Por favor, ingresa un correo electrónico válido.</div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="apellido_paterno" class="form-label" style="font-size: 0.9rem;">Apellido paterno <span class="required-mark">*</span></label>
                <input type="text" class="form-control form-control-sm" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>

            <div class="col-md-6 mb-2">
                <label for="apellido_materno" class="form-label" style="font-size: 0.9rem;">Apellido materno <span class="required-mark">*</span></label>
                <input type="text" class="form-control form-control-sm" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
        </div>

        <div class="mb-2">
            <label for="nombre" class="form-label" style="font-size: 0.9rem;">Nombre(s) <span class="required-mark">*</span></label>
            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            <div class="invalid-feedback">Este campo es obligatorio.</div>
        </div>

        <div class="mb-2">
            <label for="telefono" class="form-label" style="font-size: 0.9rem;">Teléfono <span class="required-mark">*</span></label>
            <input type="tel" class="form-control form-control-sm" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
            <div class="form-helper" style="font-size: 0.8rem;">Ejemplo: +52 123 456 7890</div>
            <div class="invalid-feedback">Por favor, ingresa un número de teléfono válido.</div>
        </div>

        <!-- Tipo de usuario -->
        <h2 class="mb-3" style="font-size: 1.3rem;">Tipo de Usuario</h2>
        <div class="mb-2">
            <div class="form-check">
                <input type="radio" class="form-check-input" id="empleado" name="usuario" value="Empleado" {{ old('usuario') == 'Empleado' ? 'checked' : '' }} required>
                <label class="form-check-label" for="empleado" style="font-size: 0.9rem;">Empleado</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="alumno" name="usuario" value="Alumno" {{ old('usuario') == 'Alumno' ? 'checked' : '' }} required>
                <label class="form-check-label" for="alumno" style="font-size: 0.9rem;">Alumno</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="kioskos" name="usuario" value="Kioskos" {{ old('usuario') == 'Kioskos' ? 'checked' : '' }} required>
                <label class="form-check-label" for="kioskos" style="font-size: 0.9rem;">Kioskos</label>
            </div>
        </div>

        <div id="seccion-alumno" class="mb-2" style="display: none;">
            <label for="numero_control" class="form-label" style="font-size: 0.9rem;">Número de control (solo para alumnos)</label>
            <input type="text" class="form-control form-control-sm" id="numero_control" name="numero_control" value="{{ old('numero_control') }}">
            <div class="form-helper" style="font-size: 0.8rem;">Ingresa tu número de matrícula si eres alumno.</div>
        </div>
        <div id="seccion-empleado" class="mb-2" style="display: none;">
            <label for="numero_nomina" class="form-label" style="font-size: 0.9rem;">Número de Nomina (solo para Administrativos y Docentes)</label>
            <input type="text" class="form-control form-control-sm" id="numero_nomina" name="numero_nomina" value="{{ old('numero_nomina') }}">
            <div class="form-helper" style="font-size: 0.8rem;">Ingresa tu número de Nomina.</div>
        </div>

        <!-- Datos vehiculares -->
        <h2 class="mb-3" style="font-size: 1.3rem;">Datos Vehiculares</h2>

        <!-- Tipo de vehículo -->
        <div class="mb-2">
            <div class="form-check">
                <input type="radio" class="form-check-input" id="bicicleta" name="tipo_vehiculo" value="3" {{ old('tipo_vehiculo') == '3' ? 'checked' : '' }} required onclick="togglePlaca()">
                <label class="form-check-label" for="bicicleta" style="font-size: 0.9rem;">Bicicleta</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="motocicleta" name="tipo_vehiculo" value="2" {{ old('tipo_vehiculo') == '2' ? 'checked' : '' }} required onclick="togglePlaca()">
                <label class="form-check-label" for="motocicleta" style="font-size: 0.9rem;">Motocicleta</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="scooter" name="tipo_vehiculo" value="4" {{ old('tipo_vehiculo') == '4' ? 'checked' : '' }} required onclick="togglePlaca()">
                <label class="form-check-label" for="scooter" style="font-size: 0.9rem;">Scooter eléctrico</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="automovil" name="tipo_vehiculo" value="1" {{ old('tipo_vehiculo') == '1' ? 'checked' : '' }} required onclick="togglePlaca()">
                <label class="form-check-label" for="automovil" style="font-size: 0.9rem;">Automóvil</label>
            </div>
        </div>

        <!-- Campos vehiculares -->
        <div id="seccion-vehiculo" class="mb-2">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="marca" class="form-label" style="font-size: 0.9rem;">Marca:</label>
                    <input type="text" class="form-control form-control-sm" id="marca" name="marca" value="{{ old('marca') }}">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="modelo" class="form-label" style="font-size: 0.9rem;">Modelo:</label>
                    <input type="text" class="form-control form-control-sm" id="modelo" name="modelo" value="{{ old('modelo') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="color" class="form-label" style="font-size: 0.9rem;">Color:</label>
                    <input type="text" class="form-control form-control-sm" id="color" name="color" value="{{ old('color') }}">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="placa" class="form-label" style="font-size: 0.9rem;">Placa:</label>
                    <input type="text" class="form-control form-control-sm" id="placa" name="placa" value="{{ old('placa') }}" pattern="[A-Za-z0-9]+" title="Solo letras y números, sin espacios ni guiones">
                    <div class="form-helper" style="font-size: 0.8rem;">Solo se permiten letras y números (sin espacios ni guiones).</div>
                </div>
            </div>
        </div>

        <!-- Cargar imágenes -->
        <div class="mb-2">
            <label for="foto_ine_frontal" class="form-label" style="font-size: 0.9rem;">Fotografía de INE (Frente):</label>
            <input type="file" class="form-control form-control-sm" id="foto_ine_frontal" name="foto_ine_frontal" accept="image/*">
        </div>

        <div class="mb-2">
            <label for="foto_ine_trasera" class="form-label" style="font-size: 0.9rem;">Fotografía de INE (Reverso):</label>
            <input type="file" class="form-control form-control-sm" id="foto_ine_trasera" name="foto_ine_trasera" accept="image/*">
        </div>
        <div class="mb-2">
            <label for="foto_tarjeta_circulacion" class="form-label" style="font-size: 0.9rem;">Fotografía de Tarjeta de Circulación</label>
            <input type="file" class="form-control form-control-sm" id="foto_tarjeta_circulacion" name="foto_tarjeta_circulacion" accept="image/*">
        </div>

        <div class="mb-2">
            <label for="foto_vehiculo" class="form-label" style="font-size: 0.9rem;">Foto del Vehículo</label>
            <input type="file" class="form-control form-control-sm" id="foto_vehiculo" name="foto_vehiculo" accept="image/*">
        </div>
        
        <button type="submit" class="btn btn-primary btn-sm">Enviar Solicitud</button>
    </form>

    <!-- JavaScript para la validación y manejo de formularios -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var usuarioRadios = document.querySelectorAll('input[name="usuario"]');
            var seccionAlumno = document.getElementById('seccion-alumno');
            var seccionEmpleado = document.getElementById('seccion-empleado');
            var tipoVehiculoRadios = document.querySelectorAll('input[name="tipo_vehiculo"]');
            var seccionVehiculo = document.getElementById('seccion-vehiculo');

            usuarioRadios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    if (this.value === 'Alumno') {
                        seccionAlumno.style.display = 'block';
                        seccionEmpleado.style.display = 'none';
                    } else if (this.value === 'Empleado') {
                        seccionEmpleado.style.display = 'block';
                        seccionAlumno.style.display = 'none';
                    } else {
                        seccionAlumno.style.display = 'none';
                        seccionEmpleado.style.display = 'none';
                    }
                });
            });

            // Form validation
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        });

        function togglePlaca() {
            var bicicleta = document.getElementById('bicicleta').checked;
            var scooter = document.getElementById('scooter').checked;
            var placa = document.getElementById('placa');

            if (bicicleta || scooter) {
                placa.disabled = true;  // Deshabilitar campo de placa
                placa.value = '';       // Limpiar el valor del campo
            } else {
                placa.disabled = false;  // Habilitar campo de placa
            }
        }

        // Llamar a la función al cargar la página para asegurar el estado correcto
        window.onload = function() {
            togglePlaca();
        };
    </script>
@endsection
