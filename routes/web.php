<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\RegisterController;

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

Route::get('/registro', [RegisterController::class, 'index'])->name('/registro');

Route::post('/registrousuario', [RegisterController::class, 'newuser'])->name('/registrousuario');

Route::get('/homePrincipal', function () {
    return view('home');
});

Route::get('/', function () {
    return view('home');
});

//Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rutas para ofertas
Route::get('/ofertas',[OfertaController::class, 'index'])->name('/ofertas');
Route::post('/createOfertas',[OfertaController::class, 'create'])->name('/createOfertas');