<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin_login_vista');
    Route::post('loginPanel', [LoginController::class, 'loginAdministrador'])->name('admin_login_inicio_sesion');
    Route::get('panel', [LoginController::class, 'adminHome'])->name('admin_vista_home');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin_logout');
    Route::get('usuariosAdmin', [UsuariosController::class, 'usuariosAdmin'])->name('administracion_usuarios');
});
