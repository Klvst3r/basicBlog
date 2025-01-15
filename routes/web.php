<?php

use Illuminate\Http\Request; // Clase que significa solicitud o peticion 
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

Route::get('/', function () {
    return 'Ruta Home';
});

Route::get('blog', function () {
    return 'Listado de publicaciones';
});


Route::get('buscar', function (Request $request) {
    // consulta a BD
    return $request->all();
});