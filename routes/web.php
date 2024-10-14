<?php

use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('solicitud');
});

Route::post('/solicitud', [SolicitudController::class, 'store'])->name('solicitud.store');
