<?php
//Controlador invocable
namespace App\Http\Controllers;

use App\Events\PostCreated;
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

    public function index(Request $request)
    {
        $order = $request->get('order');

        $search = trim($request->get('search'));

        if ($order == 'asc' || $order == 'desc') {
            if (!empty($search)) {
                $posts = Post::query()
                    ->where('published_at', '<=', now())
                    ->where('search', 'like', "%$search%") //busca algo que contenga el search
                    ->orderBy('published_at', $order)
                    ->paginate(9);
            } else {
                // Si no hay título, solo aplica el orden
                $posts = Post::query()
                    ->where('published_at', '<=', now())
                    ->orderBy('published_at', $order)
                    ->paginate(9);
            }

        }

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


        /*Post::create(array_merge($request->validated(),
            ['user_id' => auth()->user()->id],
            ));*/

        auth()->user()->posts()->create($request->validated());

        event(new PostCreated(auth()->user()));

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

        $posts = auth()->user()->posts()->paginate(5);

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
