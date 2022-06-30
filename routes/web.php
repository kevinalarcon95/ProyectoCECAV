<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AspiOfertaController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PreicfesController;
use App\Http\Controllers\InscripcionOfertaController;

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

Auth::routes();

//Auth::routes(['register' => false, 'reset' => false]);

Route::get('/homePrincipal', function () {
    return view('infoCecav.infoGeneral');
});

Route::get('/', function () {
    return view('infoCecav.infoGeneral');
});

//Rutas ofertas e inscripciones
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/ofertasInscripciones', [OfertaController::class, 'index'])->name('/ofertasInscripciones');
Route::get('/detalleOferta/{idOfer?}', [OfertaController::class, 'show'])->name('/detalleOferta/{idOfer?}');

//Rutas informacion cecav
Route::get('/homeInfo', [InfoController::class, 'index'])->name('/homeInfo');
Route::get('/homeInfo/quienesSomos', [InfoController::class, 'info'])->name('/homeInfo/quienesSomos');
Route::get('/homeInfo/funcionesCecav', [InfoController::class, 'funciones'])->name('/homeInfo/funcionesCecav');

//Rutas preicfes
Route::get('/preIcfes', [PreicfesController::class, 'index'])->name('/preIcfes');

//Rutas para ofertas
Route::get('/ofertas', [OfertaController::class, 'create'])->name('/ofertas');

Route::group(['middleware' => ['auth']], function () {
    //Rutas para inscribirse a una ofera
    Route::get('/inscripcionOferta/{idOfer?}', [AspiOfertaController::class, 'index'])->name('/inscripcionOferta/{idOfer?}');
    Route::post('/saveInscripcion', [AspiOfertaController::class, 'store'])->name('/saveInscripcion');

    Route::get('/admin/listOferta', [OfertaController::class, 'list'])->name('/admin/listOferta');
    //Route::get('/admin/editOferta/{idOfer?}', [OfertaController::class, 'vistaEditar'])->name('/admin/editOferta/{idOfer?}');

    Route::get('/admin/createOferta', [OfertaController::class, 'create'])->name('/admin/createOferta');
    Route::post('/admin/saveOferta', [OfertaController::class, 'store'])->name('/admin/saveOferta');

    Route::get('/admin/editOferta/{idOfer?}', [OfertaController::class, 'edit'])->name('/admin/editOferta/{idOfer?}');
    Route::post('/admin/editOferta', [OfertaController::class, 'edit'])->name('/admin/editOferta');
    Route::put('/admin/update/{id}', [OfertaController::class, 'update'])->name('ofertas.update');

    Route::delete('/admin/deleteOferta/{id}', [OfertaController::class, 'destroy'])->name('/admin/deleteOferta');
});
