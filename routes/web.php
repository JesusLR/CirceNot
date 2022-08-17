<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('autorizados.auth.login');
});
require __DIR__ . '/administrador/adminRuta.php';
require __DIR__ .'/usuarios/usuarioRuta.php';

// Route::get('/Acceso', [App\Http\Controllers\LoginController::class, 'acceso'])->name('acceso');

/*
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');

Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'usuarios'])->name('usuarios');
*/
