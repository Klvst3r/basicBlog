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
            'body' => 'required',
        ],
        [
            'title.required' => 'Debe ingresar el titulo',
            'body.required' => 'Debe ingresar el conenido del posst.',
        ]
    
    );

        //Una nueva publicación a partir del usuario logueado que se enuanetra en la case Request $request
        //Cremos el registro
        $post = $request->user()->posts()->create([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
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
            'body' => 'required',
        ],
        [
            'title.required' => 'Debe ingresar el titulo',
            'body.required' => 'Debe ingresar el conenido del posst.',
        ]
      );

        $post->update([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
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
