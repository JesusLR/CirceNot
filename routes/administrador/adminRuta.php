<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministradorController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function () {
    Route::get('login', [LoginController::class, 'vistaLoginAdmin'])->name('admin_login_vista');
    Route::post('inicio-sesion', [LoginController::class, 'loginAdministrador'])->name('admin_login_inicio_sesion');
    Route::get('home', [AdministradorController::class, 'adminHome'])->name('admin_vista_home');
});
