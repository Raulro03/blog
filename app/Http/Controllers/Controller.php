<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function __index() {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }
}
