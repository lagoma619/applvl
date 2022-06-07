<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;

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

Route::get('cuenta/consultar-todo', [CuentaController::class, 'getAll']);
Route::get('cuenta/consultar-por-id', [CuentaController::class, 'getFindById']);
Route::get('cuenta/loguear', [CuentaController::class, 'getFindByCodeAndPassword']);
Route::get('cuenta/registrar', [CuentaController::class, 'save']);

Route::get('persona/consultar-todo', [PersonaController::class, 'getAll']);
Route::get('persona/consultar-por-id', [PersonaController::class, 'getFindById']);
Route::get('persona/registrar', [PersonaController::class, 'save']);

Route::get('tipos-cuenta/consultar-todo', [TiposCuentaController::class, 'getAll']);
Route::get('tipos-cuenta/consultar-por-id', [TiposCuentaController::class, 'getFindById']);
Route::get('tipos-cuenta/registrar', [TiposCuentaController::class, 'save']);

Route::get('area/consultar-todo', [AreaController::class, 'getAll']);
Route::get('area/consultar-por-id', [AreaController::class, 'getFindById']);
Route::get('area/registrar', [AreaController::class, 'save']);

Route::get('sede/consultar-todo', [SedeController::class, 'getAll']);
Route::get('sede/consultar-por-id', [SedeController::class, 'getFindById']);
Route::get('sede/registrar', [SedeController::class, 'save']);

Route::get('cliente/consultar-todo', [ClienteController::class, 'getAll']);
Route::get('cliente/consultar-por-id', [ClienteController::class, 'getFindById']);
Route::get('cliente/registrar', [ClienteController::class, 'save']);

Route::get('domicilio/consultar-todo', [DomicilioController::class, 'getAll']);
Route::get('domicilio/consultar-por-id', [DomicilioController::class, 'getFindById']);
Route::get('domicilio/registrar', [DomicilioController::class, 'save']);

Route::get('tipos-servicio/consultar-todo', [TiposServicioController::class, 'getAll']);
Route::get('tipos-servicio/consultar-por-id', [TiposServicioController::class, 'getFindById']);
Route::get('tipos-servicio/registrar', [TiposServicioController::class, 'save']);

Route::get('tipos-vehiculo/consultar-todo', [TiposVehiculoController::class, 'getAll']);
Route::get('tipos-vehiculo/consultar-por-id', [TiposVehiculoController::class, 'getFindById']);
Route::get('tipos-vehiculo/registrar', [TiposVehiculoController::class, 'save']);
