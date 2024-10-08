<?php
//Controlador invocable
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();

        //dd($posts);

        return view('blog', compact('posts'));
    }

}
