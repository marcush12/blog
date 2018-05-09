<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {

        //validação
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'category'=>'required',
            'excerpt'=>'required'
        ]);
        //return Post::create($request->all());
        //return $request->all();
        $post = new Post;
        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null;
        $post->category_id = $request->get('category');//only category at last

        $post->save();

        $post->tags()->attach($request->get('tags'));
        return back()->with('flash', 'Seu Post foi criado com sucesso!');

    }
}
