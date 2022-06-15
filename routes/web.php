<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\AdminController;

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
    return view('home');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/ofertasInscripciones', [OfertaController::class, 'index'])->name('/ofertasInscripciones');

//Rutas para ofertas
Route::get('/ofertas', [OfertaController::class, 'create'])->name('/ofertas');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/listOferta', [OfertaController::class, 'list'])->name('/admin/listOferta');
    //Route::get('/admin/editOferta/{idOfer?}', [OfertaController::class, 'vistaEditar'])->name('/admin/editOferta/{idOfer?}');

    Route::get('/admin/createOferta', [OfertaController::class, 'create'])->name('/admin/createOferta');
    Route::post('/admin/saveOferta', [OfertaController::class, 'store'])->name('/admin/saveOferta');

    Route::post('/admin/editOferta', [OfertaController::class, 'edit'])->name('/admin/editOferta');
    //Route::put('/admin/updateOferta', [OfertaController::class, 'update'])->name('/admin/updateOferta');
    Route::post('/admin/deleteOferta', [OfertaController::class, 'destroy'])->name('/admin/deleteOferta');
});
