<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){

        $posts = Post::latest()->paginate();

        return view('home', ['posts' => $posts]);
    }
    
    //Se elimina este metodo pues ya eta integrado en el home
    /*public function blog() {
        //consulta a la bse de datos*/
    /*$posts = [
        ['id' => 1, 'title' => 'PHP', 'slug' => 'php'],
        ['id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
    ];*/

    //$posts = Post::get(); // Traeme los post
    //Trabajamos con otro formato
    //$post = Post::first(); // Traeme los post

    // Buscar por ID
    //$post = Post::find(25); // Traeme los post

    //dd($post);

    //Consulta de datos paginado 
    /* segunda parte desactva del home 
    $posts = Post::latest()->paginate(); //esta busqueda ira para home

    return view('blog', ['posts' => $posts]);
    }
*/
    /*public function post($slug){
        //Logica de visualizacion de los post
    $posts = [
        'php' => ['id' => 1, 'title' => 'PHP', 'content' => 'Contenido sobre PHP'],
        'laravel' => ['id' => 2, 'title' => 'Laravel', 'content' => 'Contenido sobre Laravel']
    ];

    if (!array_key_exists($slug, $posts)) {
        abort(404, 'Post not found');
    }

    return view('post', ['post' => $posts[$slug]]);
    }*/

    //El metodo post eliminado es el siguiente:
/*
    public function blog() {
    $posts = Post::latest()->paginate(); //esta busqueda ira para home

    return view('blog', ['posts' => $posts]);
    }
*/

    public function post(Post $post){
        return view('post', ['post' => $post]);

    }
    
}
