<?php

use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Rutas protegidas
Route::middleware(['check.login'])->group(function () {
    // Ruta para mostrar la vista de solicitud
    Route::get('/solicitud', function () {
        return view('solicitud');  // Asegúrate de que la vista 'solicitud.blade.php' exista
    })->name('solicitud');  // Asignamos un nombre a esta ruta

    // Ruta para enviar el formulario al controlador de solicitud
    Route::post('/solicitud', [SolicitudController::class, 'store'])->name('solicitud.store');
});
