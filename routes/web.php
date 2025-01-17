<?php

use App\Http\Controllers\PageController;
//use Illuminate\Http\Request; // Clase que significa solicitud o peticion 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
* Route::get Consultar
* Route::post Vamos a laterar nuestra Bd - Guardar
* Route::delete Funcion Eliminar 
* Route::put  Actualizar
|
*/
/*Route::get('buscar', function (Request $request) {
    // consulta a BD
    return $request->all();
});*/
/*
Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('blog', [PageController::class, 'blog'])->name('blog');;

Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');;
*/

Route::controller(PageController::class)->group(function () {
    Route::get('/',           'home')->name('home');
    Route::get('blog',        'blog')->name('blog');
    Route::get('blog/{post:slug}', 'post')->name('post');
});