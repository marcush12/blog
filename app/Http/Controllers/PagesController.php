<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
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
        $archive = Post::selectRaw('year(published_at)  year')//as year = alias
                        ->selectRaw('monthname(published_at)  month')
                        ->selectRaw('count(*) posts')
                        ->groupBy('year', 'month')
                        ->orderBy('published_at')
                        ->get();//Raw para year ou month
        return view('pages.archive', [
            'authors'=>User::latest()->take(4)->get(),
            'categories'=>Category::take(7)->get(),
            'posts'=>Post::latest()->take(5)->get(),
            'archive'=>$archive
        ]);
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
