<?php

use Illuminate\Support\Facades\Route;
use App\Models\Servicios;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('autorizados.auth.login');
// });
Route::get('/', function(){
    return redirect()->route('usuario_vista_login');
});
Auth::routes();
Route::prefix('administrador/')->group(function(){
    Route::get('login', [App\Http\Controllers\LoginController::class, 'login'])->name('admin_login_vista');
    Route::post('loginPanel', [App\Http\Controllers\LoginController::class, 'loginAdministrador'])->name('admin_login_inicio_sesion');
    Route::get('admin-home', [App\Http\Controllers\LoginController::class, 'adminHome'])->name('admin_vista_home')->middleware('auth:admin');
});

Route::prefix('autorizados/')->group(function(){
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'vistaPersonaAutorizada'])->name('usuario_vista_login');
    Route::post('panelUser', [App\Http\Controllers\Auth\LoginController::class, 'loginPersonaAutorizada'])->name('usuario_inicio_sesion_login');
    Route::get('inicio-sesion', [App\Http\Controllers\Auth\LoginController::class, 'userHome'])->name('usuario_inicio_sesion');
});


require __DIR__ . '/administrador/adminRuta.php';
require __DIR__ .'/usuarios/usuarioRuta.php';

// Route::get('/Acceso', [App\Http\Controllers\LoginController::class, 'acceso'])->name('acceso');

/*
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');

Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'usuarios'])->name('usuarios');
*/

// Route::get('/', function () {
//     $services = Servicios::where('lActivo', 1)->get();
//     return view('', ['services' => $services]);
// });
