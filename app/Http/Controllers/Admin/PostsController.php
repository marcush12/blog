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
    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.posts.create', compact('categories', 'tags'));
    // }
    public function store(Request $request)
    {
        $this->validate($request, ['title'=>'required']);
        $post = Post::create($request->only('title'));
        return redirect()->route('admin.posts.edit', $post);
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }
    public function update(Post $post, Request $request)
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
        //$post = new Post;//já está como parâmetro
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->iframe = $request->get('iframe');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null;
        $post->category_id = $request->get('category');//only category at last

        $post->save();

        $post->tags()->attach($request->get('tags'));
        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Seu Post foi atualizado com sucesso!');

    // }
    }
}
