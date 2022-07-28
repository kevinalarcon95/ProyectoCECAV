<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AspiOfertaController;
use App\Http\Controllers\AspiIcfesController;
use App\Http\Controllers\PreicfesController;
use App\Http\Controllers\InscripcionOfertaController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EstudianteOfertaController;
use App\Http\Controllers\RegisterGoogleController;

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
/*
Route::get('/homePrincipal', function () {
    return view('infoCecav.infoGeneral');
});

Route::get('/', function () {
    return view('infoCecav.infoGeneral');
});*/
Route::get('/homePrincipal', [HomeController::class, 'index'])->name('homePrincipal');
Route::get('/', [HomeController::class, 'index'])->name('/');

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
Route::get('/detallePreIcfes/{idPreIcfes?}', [PreicfesController::class, 'show'])->name('/detallePreIcfes/{idPreIcfes?}');

//Rutas para ofertas
Route::get('/ofertas', [OfertaController::class, 'create'])->name('/ofertas');

//Rutas Google
Route::get('/loginGoogle', [RegisterGoogleController::class, 'loginGoogle'])->name('/loginGoogle');
Route::get('/google-callback', [RegisterGoogleController::class, 'callBackUser'])->name('/google-callback');
Route::get('/registreGoogle/{id}', [RegisterGoogleController::class, 'index'])->name('registre.Google');
Route::put('/updateUser/{id}', [RegisterGoogleController::class, 'update'])->name('updateUser');

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
    Route::put('/admin/updateOferta/{id}', [OfertaController::class, 'update'])->name('ofertas.update');

    Route::delete('/admin/deleteOferta/{id}', [OfertaController::class, 'destroy'])->name('/admin/deleteOferta');

    //=============================== PreIcfes ===============================
    Route::get('/admin/listPreicfes', [PreicfesController::class, 'list'])->name('/admin/listPreicfes');
    Route::get('/admin/createPreicfes', [PreicfesController::class, 'create'])->name('/admin/createPreicfes');
    Route::post('/admin/savePreicfes', [PreicfesController::class, 'store'])->name('/admin/savePreicfes');
    Route::get('/admin/editPreicfes/{id}', [PreicfesController::class, 'edit'])->name('/admin/editPreicfes/{id}');
    Route::patch('/admin/updatePreicfes/{id}', [PreicfesController::class, 'update'])->name('/admin/updatePreicfes/{id}');
    Route::delete('/admin/deletePreicfes/{id}', [PreicfesController::class, 'destroy'])->name('/admin/deletePreicfes');

    //Route::get('/preIcfes', [AspiIcfesController::class, 'index'])->name('/preIcfes');
    Route::get('/inscripcionPreIcfes/{id}', [AspiIcfesController::class, 'index'])->name('/inscripcionPreIcfes/{id}');
    Route::post('/saveInscripPreIcfes', [AspiIcfesController::class, 'store'])->name('/saveInscripPreIcfes');

    //---Listado inscritos a cursos---
    Route::get('/admin/listInscritos', [AspiOfertaController::class, 'list'])->name('/admin/listInscritos');
    //---Listado inscritos a Preicfes---
    Route::get('/admin/listInscritosPreicfes', [AspiIcfesController::class, 'list'])->name('/admin/listInscritosPreicfes');

    //=============================== Funcionarios cecav ===============================
    Route::get('/admin/listFuncionario', [FuncionarioController::class, 'list'])->name('/admin/listFuncionario');
    Route::get('/admin/createFuncionario', [FuncionarioController::class, 'create'])->name('/admin/createFuncionario');
    Route::post('/admin/saveFuncionario', [FuncionarioController::class, 'store'])->name('/admin/saveFuncionario');
    Route::delete('/admin/eliminarFuncionario/{id}', [FuncionarioController::class, 'destroy'])->name('/admin/eliminarFuncionario/{id}');
    //editar
    Route::get('/admin/editFuncionario/{id?}', [FuncionarioController::class, 'edit'])->name('/admin/editFuncionario/{id?}');
    Route::put('/admin/update/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');


    Route::get('/misOfertas', [EstudianteOfertaController::class, 'index'])->name('/misOfertas');
    Route::delete('/eliminarInscripcionOferta/{id}', [EstudianteOfertaController::class, 'destroy'])->name('/eliminarInscripcionOferta/{id}');
    Route::delete('/eliminarInscripcionPreicfes/{id}', [EstudianteOfertaController::class, 'destroyPreicfes'])->name('/eliminarInscripcionPreicfes/{id}');
});
