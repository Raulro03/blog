<?php
//Controlador invocable
namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::query()->where('published_at', '<=' , now())->get();

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

        /*$data = $request->validated();

        $data['user_id'] = Auth::id();

        Post::create($data);*/


        Post::create(array_merge($request->validated(),
            ['user_id' => auth()->user()->id],
            ));

        //auth()->user()->posts()->create($request->validated());


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

    public function myPosts()
    {

        $posts = auth()->user()->posts;

        //$user = Auth::user()->id; //o auth()->user();

        //$posts = User::find($user)->posts()->get();
        //De esto modo buscamos los posts usando las relaciones otro modo seria el siguiente

        /*
         *   $posts = Post::where('user_id', $user)->get(); De este modo no usamos las relaciones si no que hacemos
         * una consulta normal pasandole el user_id
         * */

        //dd($posts);

        return view('posts.my-posts', compact('posts'));
    }

}
