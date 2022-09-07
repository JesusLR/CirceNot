<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CatalogoDocumentosController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin_login_vista');
    Route::post('loginPanel', [LoginController::class, 'loginAdministrador'])->name('admin_login_inicio_sesion');
    Route::get('panel', [LoginController::class, 'adminHome'])->name('admin_vista_home');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin_logout');
    Route::get('usuariosAdmin', [UsuariosController::class, 'usuariosAdmin'])->name('administracion_usuarios');
    Route::get('gridUsers', [UsuariosController::class, 'gridUsers'])->name('grid_usuarios');
    Route::post('createUser', [UsuariosController::class, 'createUser']);
    Route::post('editUser', [UsuariosController::class, 'editUser']);
    Route::post('updateUser', [UsuariosController::class, 'updateUser']);
    Route::get('catalogosAdmin', [CatalogoDocumentosController::class, 'catalogosAdmin'])->name('administracion_documentos');
    Route::get('gridDocs', [CatalogoDocumentosController::class, 'gridDocs'])->name('grid_documentos');
    Route::post('createDoc', [CatalogoDocumentosController::class, 'createDoc'])->name('createDoc');
    Route::post('consultarDocumento/{id}', [CatalogoDocumentosController::class, 'consultarDocumento']);
    Route::post('stsDoc', [CatalogoDocumentosController::class, 'stsDoc']);
    Route::post('deleteDoc', [CatalogoDocumentosController::class, 'deleteDoc']);
});
