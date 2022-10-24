<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RitaController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {  return view('welcome');});
Route::get('/', [RitaController::class, 'index'])->name('rita.index');
Route::get('/rita/registro', [RitaController::class, 'registro'])->name('rita.registro');
Route::post('/rita/municipios', [RitaController::class, 'municipios'])->name('rita.municipios');
Route::post('/rita/store', [RitaController::class, 'store'])->name('rita.store');
Route::get('/rita/confirmacion', [RitaController::class, 'confirmacion'])->name('rita.confirmacion');
Route::get('/rita/finalizar', [RitaController::class, 'end'])->name('rita.finalizar');
Route::post('/rita/consulta',[RitaController::class, 'consulta'])->name('rita.consulta');

Route::post('/experiencia/tramites', [HomeController::class, 'experienciaTramites'])->name('experiencia.tramites');



Route::post('/categorizacion-parqueaderos/store', 'ParqueaderosController@store')->name('parqueaderos.store');
Route::get('/categorizacion-parqueaderos/confirmacion', 'ParqueaderosController@confirmacion')->name('parqueaderos.confirmacion');
Route::get('/categorizacion-parqueaderos/finalizar', 'ParqueaderosController@end')->name('parqueaderos.finalizar');
Route::post('/categorizacion-parqueaderos/consulta','ParqueaderosController@consulta')->name('parqueadero.consulta');
Route::get('/categorizacion-parqueaderos/detalle/{id}', 'ParqueaderosController@detalle')->name('parqueadero.detalle');
Route::post('/categorizacion-parqueaderos/updateDocs', 'ParqueaderosController@updateDocs')->name('parqueadero.updateDocs');
