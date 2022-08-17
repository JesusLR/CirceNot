<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('login', [LoginController::class, 'vistaPersonaAutorizada'])->name('usuario_vista_login');
    Route::post('inicio-sesion', [LoginController::class, 'loginPersonaAutorizada'])->name('usuario_inicio_sesion');
});
