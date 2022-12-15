<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatalogoDocumentosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PersonaLoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::post('user-logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('usuario_logout');
    Route::get('catalogoDocAdmin', [CatalogoDocumentosController::class, 'catalogoDocAdmin'])->name('catalogoDoc_Administracion');
    Route::get('catalogoDocContratos', [CatalogoDocumentosController::class, 'catalogoDocContratos'])->name('catalogoDoc_Contratos');
    Route::post('docUsers', [CatalogoDocumentosController::class, 'docUsers']);
    Route::get('newCliente', [ClientesController::class, 'newCliente'])->name('nuevo_cliente');
    Route::post('createCliente', [ClientesController::class, 'createCliente'])->name('createCliente');
    Route::get('consultarRepresentantes', [ClientesController::class, 'consultarRepresentantes'])->name('consultarRepresentantes');
    Route::get('clientesView', [ClientesController::class, 'clientesView'])->name('clientes_fisico_vista');
    Route::get('prospectosFiscView', [ClientesController::class, 'prospectosFiscView'])->name('prospectos_fisico_vista');
    Route::post('editClienteF', [ClientesController::class, 'editClienteF'])->name('editClienteF');
    Route::post('updateClienteF', [ClientesController::class, 'updateClienteF'])->name('updateClienteF');
    Route::post('consultarProspectosFisic', [ClientesController::class, 'consultarProspectosFisic'])->name('consultarProspectosFisic');
    Route::get('clientesMorView', [ClientesController::class, 'clientesMorView'])->name('clientes_moral_vista');
    Route::post('consultarClientes', [ClientesController::class, 'consultarClientes'])->name('consultarClientesM');
    Route::post('editClienteM', [ClientesController::class, 'editClienteM'])->name('editClienteM');
    Route::post('updateClienteM', [ClientesController::class, 'updateClienteM'])->name('updateClienteM');
    Route::get('prospectosMorView', [ClientesController::class, 'prospectosMorView'])->name('prospectos_moral_vista');
    Route::get('consultarProspectosM', [ClientesController::class, 'consultarProspectosM'])->name('consultarProspectosM');

    Route::post('createPlantillaPDF', [CatalogoDocumentosController::class, 'createPlantillaPDF'])->name('createPlantillaPDF');
    //Services
    Route::get('newService', [ServiceController::class, 'newService'])->name('new_service');
    Route::post('createService', [ServiceController::class, 'createService'])->name('createService');
    Route::get('ServiceIndex', [ServiceController::class, 'ServiceIndex'])->name('service_index');
    Route::get('getServices', [ServiceController::class, 'getServices'])->name('getServices');
    Route::post('getServicesById', [ServiceController::class, 'getServicesById'])->name('getServicesById');
    Route::post('getServicesById', [ServiceController::class, 'getServicesById'])->name('getServicesById');
    Route::post('updateService', [ServiceController::class, 'updateService'])->name('updateService');

    //presupuesto
    Route::get('newPresupuesto', [PresupuestoController::class, 'newPresupuesto'])->name('newPresupuesto');
    Route::post('createPresupuesto', [PresupuestoController::class, 'createPresupuesto'])->name('createPresupuesto');
    Route::get('presupuestosIndex', [PresupuestoController::class, 'presupuestosIndex'])->name('presupuestosIndex');
    Route::get('getPresupuestos', [PresupuestoController::class, 'getPresupuestos'])->name('getPresupuestos');
    Route::post('createPDFpresupuesto', [PresupuestoController::class, 'createPDFpresupuesto'])->name('createPDFpresupuesto');


});
