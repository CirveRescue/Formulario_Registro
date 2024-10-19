<?php

use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar la vista del formulario de solicitud
Route::get('/', function () {
    return view('solicitud');  // Asegúrate de que la vista 'solicitud.blade.php' exista en la carpeta resources/views
});

// Ruta para enviar el formulario al controlador
Route::post('/solicitud', [SolicitudController::class, 'store'])->name('solicitud.store');
