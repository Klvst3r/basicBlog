<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        //consulta directa
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create(Post $post) {
        // Retorna a la vists
        return view('posts.create', ['post' => $post ]);
    }

    public function store(Request $request) {

        //Validación
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'body' => 'required',
        ],
        [
            'title.required' => 'Debe ingresar el titulo',
            'slug.required' => 'La URL amigable es requerida',
            'body.required' => 'Debe ingresar el conenido del posst.',
        ]
    
    );

        //Una nueva publicación a partir del usuario logueado que se enuanetra en la case Request $request
        //Cremos el registro
        $post = $request->user()->posts()->create([
            //'title' => $title = $request->title, //como se lsalvara de manera directa sustituimos con la siguiente liena
            'title' => $request->title,
            'slug' => $request->slug,
            //'slug' => Str::slug($title), //Se hace asi por que interesa aprovechar el bloque de validacion
            'body' => $request->body,
        ]);

        

        // Retorna a la vists
        return redirect()->route('posts.edit', $post);
        
    }


    public function edit(Post $post) {
    return view('posts.edit', ['post' => $post ]);
    }


    public function update(Request $request, Post $post) {

        //Validación
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'body' => 'required',
        ],
        [
            'title.required' => 'Debe ingresar el titulo',
            'body.required' => 'Debe ingresar el conenido del posst.',
        ]
      );

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
        ]);

        // Retorna a la vists
        return redirect()->route('posts.edit', $post);
        
    }


    public function destroy(Post $post) {
        $post->delete();
        //consulta directa
        return back();
    }

}
