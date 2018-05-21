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
            $post->load('owner', 'category', 'tags', 'photos');
            if (request()->wantsJson()) {//se for chamada de ajax
                return $post;
            }
            return view('posts.show', compact('post'));
        }
        abort('404');
    }
}
