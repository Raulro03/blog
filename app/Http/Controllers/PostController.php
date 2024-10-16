<?php
//Controlador invocable
namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

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
        return view('posts.create', ['post' => new Post()]);
    }

    public function store(StorePostRequest $request){

        Post::create($request->validated());

        return to_route('posts.index')
            ->with('status', 'Post creates succesfully!');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->update($request->validated());

        return to_route('posts.show', $post)
            ->with('status', 'Post updates succesfully!');
    }

    public function destroy(Post $post){
        $post->delete();

        return to_route('posts.index')
            ->with('status', 'Post deletes succesfully!');
    }

}
