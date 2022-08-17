<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function () {
    Route::get('login', [LoginController::class, 'vistaLoginAdmin'])->name('admin_login_vista');
    Route::post('inicio-sesion', [LoginController::class, 'loginAdministrador'])->name('admin_login_inicio_sesion');

});
