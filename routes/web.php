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


Route::get('/homePrincipal', function () {
    return view('home');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rutas para ofertas
Route::get('/ofertas', [OfertaController::class, 'index'])->name('/ofertas');
//Route::post('/createOferta', [OfertaController::class, 'create'])->name('/createOferta');

Route::group(['middleware' => ['auth']], function () {
    //Route::resource('/admin/ofertas',OfertaController::class);
    Route::get('/admin/home', [AdminController::class, 'index'])->name('/admin/home');

    Route::get('/admin/listOferta', [OfertaController::class, 'list'])->name('/admin/listOferta');
    Route::post('/admin/createOferta', [OfertaController::class, 'create'])->name('/admin/createOferta');

    Route::get('/admin/createOferta', function () {
        return view('ofertas.create');
    })->name('/admin/createOferta');

    Route::get('/admin/editOferta/{idOfer?}', [OfertaController::class, 'vistaEditar'])->name('/admin/editOferta/{idOfer?}');
        Route::post('/admin/editOferta', [OfertaController::class, 'edit'])->name('/admin/editOferta');
        Route::post('/admin/deleteOferta', [OfertaController::class, 'delete'])->name('/admin/deleteOferta');
});
