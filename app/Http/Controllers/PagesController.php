<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        // $posts = Post::whereNotNull('published_at')//exceto os com data nula
        //                 ->where('published_at', '<=', Carbon::now())
        //                 ->latest('published_at')
        //                 ->get();//a partir do último post para baixo
        $posts = Post::published()->paginate(2);//default=15
        return view('pages.home', compact('posts'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function archive()
    {
        return view('pages.archive');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
