<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::latest('published_at')->get();//a partir do último post para baixo
        return view('welcome', compact('posts'));
    }
}
