<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

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
    public function edit(Post $post) {
    return view('posts.edit', ['post' => $post ]);
    }

    public function destroy(Post $post) {
        $post->delete();
        //consulta directa
        return back();
    }

}
