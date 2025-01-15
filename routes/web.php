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
    //return 'Ruta Home';
    return view('home');
})->name('home');

Route::get('blog', function () {
    $posts = [
        ['id' => 1, 'title' => 'PHP', 'slug' => 'php'],
        ['id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
    ];

    return view('blog', ['posts' => $posts]);
})->name('blog');;


/*Route::get('buscar', function (Request $request) {
    // consulta a BD
    return $request->all();
});*/

Route::get('blog/{slug}', function ($slug) {
    $posts = [
        'php' => ['id' => 1, 'title' => 'PHP', 'content' => 'Contenido sobre PHP'],
        'laravel' => ['id' => 2, 'title' => 'Laravel', 'content' => 'Contenido sobre Laravel']
    ];

    if (!array_key_exists($slug, $posts)) {
        abort(404, 'Post not found');
    }

    return view('post', ['post' => $posts[$slug]]);
})->name('post');;