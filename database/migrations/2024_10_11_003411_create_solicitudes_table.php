<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();  // Crea un campo 'id' de tipo auto-incremental (llave primaria)
            $table->string('correo_electronico');  // Campo de texto para almacenar correos
            $table->string('apellido_paterno');  // Campo de texto para apellido paterno
            $table->string('apellido_materno');  // Campo de texto para apellido materno
            $table->string('nombre');  // Campo de texto para nombre
            $table->string('telefono');  // Campo de texto para teléfono
            $table->enum('usuario', ['Empleado', 'Alumno', 'Kioskos']);  // Enumeración con los tipos de usuarios
            $table->string('numero_control')->nullable(); // Solo si es Alumno
            $table->enum('tipo_vehiculo', ['Bicicleta', 'Motocicleta', 'Scooter eléctrico', 'Automóvil']);
            
            // Campos para automóvil
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('color')->nullable();
            $table->string('placa')->nullable();
            
            // Campos para cargar archivos
            $table->string('foto_ine_frontal')->nullable();
            $table->string('foto_ine_trasera')->nullable();
            $table->string('foto_tarjeta_circulacion')->nullable();
            $table->string('foto_vehiculo')->nullable(); // Puede ser automóvil, motocicleta, bicicleta, etc.

            $table->timestamps();  // Crea los campos 'created_at' y 'updated_at' para el registro de fechas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
};
