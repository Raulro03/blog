<?php
//Controlador invocable
namespace App\Http\Controllers;

class PostController
{
    public function __invoke()
    {
        $posts = [
            ['title' => 'Post 1'],
            ['title' => 'Post 2'],
            ['title' => 'Post 3'],
            ['title' => 'Post 4'],
        ];
        return view('blog', compact('posts'));
    }

}
