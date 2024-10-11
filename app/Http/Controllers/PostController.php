<?php
//Controlador invocable
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        //dd($posts);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ],
        [
            'title.required' => 'El campo Titulo es obligatorio',
            'body.required' => 'El campo Contenido es obligatorio',
        ]
        );

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        session()->flash('status', 'Post creates succesfully!');

        return to_route('posts.index');
    }
}
