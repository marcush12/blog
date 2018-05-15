<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        //$posts = auth()->user()->posts;//poderia ser Post::where('user_id', auth()->id())->get();
        // if (auth()->user()->hasRole('Admin')) {
        //     $posts = Post::all();
        // } else {
        //     $posts = auth()->user()->posts;
        // }
        $posts = Post::allowed()->get();//substitui o if acima! ele foi para scopeAllowed() em Post.php
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
        $this->authorize('create', new Post);
        $this->validate($request, ['title'=>'required|min:3']);
        //$post = Post::create($request->only('title'));
        $post = Post::create($request->all());
        return redirect()->route('admin.posts.edit', $post);
    }
    public function edit(Post $post)
    {
        $this->authorize('view', $post);//view method in PostPolicy//pedimos autorização para ver este post
        return view('admin.posts.edit', [
            'categories' =>Category::all(),
            'tags'=>Tag::all(),
            'post'=>$post
        ]);
    }
    public function update(Post $post, StorePostRequest $request)
    {

        //validação// foi feita com php artisan make:request StorePostRequest
        // $this->validate($request, [
        //     'title'=>'required',
        //     'body'=>'required',
        //     'category'=>'required',
        //     'excerpt'=>'required'
        // ]);
        //return Post::create($request->all());
        //return $request->all();
        //$post = new Post;//já está como parâmetro
        // $post->title = $request->get('title');
        // $post->body = $request->get('body');
        // $post->iframe = $request->get('iframe');
        // $post->excerpt = $request->get('excerpt');
        // $post->published_at = $request->get('published_at');
        // $post->category_id = $request->get('category_id');
        // $post->save();
        $this->authorize('update', $post);
        $post->update($request->all());


        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)
                         ->with('flash', 'Seu Post foi atualizado com sucesso!');

    // }
    }
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->tags()->detach(); //vai eliminar todas as referências a tags do post
        $post->photos->each->delete();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('flash', 'Seu Post foi eliminado com sucesso!');
    }
}
