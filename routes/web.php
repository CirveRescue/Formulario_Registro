<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar la vista del formulario de solicitud
Route::get('/', function () {
    return view('solicitud');  // Asegúrate de que la vista 'solicitud.blade.php' exista en la carpeta 'resources/views'
});

// Ruta para enviar el formulario al controlador de solicitud
Route::post('/solicitud', [SolicitudController::class, 'store'])->name('solicitud.store');

// Ruta para ver la lista de usuario (tabla 'usuario')
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');

// Ruta para crear un nuevo usuario (tabla 'usuario')
Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');

// Ruta para guardar el nuevo usuario en la base de datos (tabla 'usuario')
Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');

// Ruta para ver un usuario en particular (tabla 'usuario')
Route::get('/usuario/{usuario}', [UsuarioController::class, 'show'])->name('usuario.show');

// Ruta para editar un usuario (tabla 'usuario')
Route::get('/usuario/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuario.edit');

// Ruta para actualizar un usuario en la base de datos (tabla 'usuario')
Route::put('/usuario/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');

// Ruta para eliminar un usuario de la base de datos (tabla 'usuario')
Route::delete('/usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
