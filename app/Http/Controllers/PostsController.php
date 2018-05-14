<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);//binding Post $post; we dont need the line anymore
        if ($post->isPublished() || auth()->check()) {
            return view('posts.show', compact('post'));
        }
        abort('404');
    }
}
