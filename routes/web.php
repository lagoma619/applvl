<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TiposCuentaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\TiposServicioController;
use App\Http\Controllers\TiposVehiculoController;

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
    return view('welcome');
});

Route::get('cuenta/consultar-todo', [CuentaController::class, 'buscarTodo']);
Route::get('cuenta/consultar-por-id', [CuentaController::class, 'buscarPorCodigo']);
Route::get('cuenta/loguear', [CuentaController::class, 'buscarPorCodigoYContrasena']);
Route::get('cuenta/registrar', [CuentaController::class, 'registrar']);

Route::get('persona/consultar-todo', [PersonaController::class, 'buscarTodo']);
Route::get('persona/consultar-por-id', [PersonaController::class, 'buscarPorCodigo']);
Route::get('persona/registrar', [PersonaController::class, 'registrar']);

Route::get('tipos-cuenta/consultar-todo', [TiposCuentaController::class, 'buscarTodo']);
Route::get('tipos-cuenta/consultar-por-id', [TiposCuentaController::class, 'buscarPorCodigo']);
Route::get('tipos-cuenta/registrar', [TiposCuentaController::class, 'registrar']);

Route::get('area/consultar-todo', [AreaController::class, 'buscarTodo']);
Route::get('area/consultar-por-id', [AreaController::class, 'buscarPorCodigo']);
Route::get('area/registrar', [AreaController::class, 'registrar']);

Route::get('sede/consultar-todo', [SedeController::class, 'buscarTodo']);
Route::get('sede/consultar-por-id', [SedeController::class, 'buscarPorCodigo']);
Route::get('sede/registrar', [SedeController::class, 'registrar']);

Route::get('cliente/consultar-todo', [ClienteController::class, 'buscarTodo']);
Route::get('cliente/consultar-por-id', [ClienteController::class, 'buscarPorCodigo']);
Route::get('cliente/consultar-por-nombre', [ClienteController::class, 'buscarPorNombre']);
Route::get('cliente/registrar', [ClienteController::class, 'registrar']);

Route::get('domicilio/consultar-todo', [DomicilioController::class, 'buscarTodo']);
Route::get('domicilio/consultar-por-id', [DomicilioController::class, 'buscarPorCodigo']);
Route::get('domicilio/registrar', [DomicilioController::class, 'registrar']);

Route::get('tipos-servicio/consultar-todo', [TiposServicioController::class, 'buscarTodo']);
Route::get('tipos-servicio/consultar-por-id', [TiposServicioController::class, 'buscarPorCodigo']);
Route::get('tipos-servicio/registrar', [TiposServicioController::class, 'registrar']);

Route::get('tipos-vehiculo/consultar-todo', [TiposVehiculoController::class, 'buscarTodo']);
Route::get('tipos-vehiculo/consultar-por-id', [TiposVehiculoController::class, 'buscarPorCodigo']);
Route::get('tipos-vehiculo/registrar', [TiposVehiculoController::class, 'registrar']);
