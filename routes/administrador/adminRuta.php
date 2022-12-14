<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CatalogoDocumentosController;
use App\Http\Controllers\GestoriaController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('admin_logout');
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
    //gestoria
    Route::get('editarGestoria', [GestoriaController::class, 'gestoriaEdit'])->name('edit_gestoria');
    Route::post('updateGestoria', [GestoriaController::class, 'updateGestoria'])->name('update_Gestoria');
});

Route::prefix('perfiles/')->group(function(){
    Route::get('inicio', [RoleController::class, 'index'])->name('admin_perfiles_inicio');
    Route::post('gridProfiles', [RoleController::class, 'gridProfiles'])->name('admin_carga_perfiles');
    Route::get('editar-permiso/{id}', [RoleController::class, 'editProfilePermission'])->name('admin_editar_role_permiso');
    Route::get('gridProfilePermissions/{id}', [RoleController::class, 'gridProfilePermissions'])->name('admin_permisos_perfiles');
    Route::put('updateProfilePermissions/{id}', [RoleController::class, 'updateProfilePermissions'])->name('admin_actualizar_permisos_perfiles');
    Route::put('assignProfilePermissions/{id}', [RoleController::class, 'assignProfilePermissions'])->name('admin_asignar_permisos_perfiles');
});

