<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CatalogoDocumentosController;
use App\Http\Controllers\GestoriaController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('admin_logout');
    Route::get('usuariosAdmin', [UsuariosController::class, 'usuariosAdmin'])->name('administracion_usuarios');
    Route::get('gridUsers', [UsuariosController::class, 'gridUsers'])->name('grid_usuarios');
    Route::post('createUser', [UsuariosController::class, 'createUser'])->name('create_adminUser');;
    Route::post('editUser', [UsuariosController::class, 'editUser']);
    Route::post('updateUser', [UsuariosController::class, 'updateUser']);
    Route::get('catalogosAdmin', [CatalogoDocumentosController::class, 'catalogosAdmin'])->name('administracion_documentos');
    Route::get('gridDocs', [CatalogoDocumentosController::class, 'gridDocs'])->name('grid_documentos');
    Route::post('createDoc', [CatalogoDocumentosController::class, 'createDoc'])->name('createDoc');
    Route::get('consultarDocumento/{id}', [CatalogoDocumentosController::class, 'consultarDocumento']);
    Route::post('stsDoc', [CatalogoDocumentosController::class, 'stsDoc']);
    Route::post('deleteDoc', [CatalogoDocumentosController::class, 'deleteDoc']);
    Route::get('gestoriaCreate', [GestoriaController::class, 'gestoriaCreate'])->name('administracion_gestoria');
    Route::post('createGestoria', [GestoriaController::class, 'createGestoria'])->name('createGestoria');
    Route::post('docprueba', [CatalogoDocumentosController::class, 'docprueba'])->name('docprueba_pure');
    // Route::get('docpruebaget', [CatalogoDocumentosController::class, 'docpruebaget'])->name('docpruebaget');
});

