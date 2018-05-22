<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function spa()
    {
        return view('pages.spa');
    }

    public function home()
    {
        // $posts = Post::whereNotNull('published_at')//exceto os com data nula
        //                 ->where('published_at', '<=', Carbon::now())
        //                 ->latest('published_at')
        //                 ->get();//a partir do último post para baixo
        $query = Post::published();
        if (request('month')) {
            $query->whereMonth('published_at', request('month'));
        }
        if (request('year')) {
            $query->whereYear('published_at', request('year'));
        }
        $posts = $query->paginate();//default=15
        if (request()->wantsJson()) {//chamada de ajax pede json, retorna
            return $posts;
        }
        return view('pages.home', compact('posts'));//não deu json retorna html
    }
    public function about()
    {
        return view('pages.about');
    }
    public function archive()
    {
        //\DB::statement("SET lc_time_names = 'pt_BR'");//mudar meses para português;foi mandado p AppServiceProvider.boot

        $data = [
            'authors'=>User::latest()->take(4)->get(),
            'categories'=>Category::take(7)->get(),
            'posts'=>Post::latest('published_at')->take(5)->get(),
            'archive'=>Post::selectRaw('year(published_at)  year')//as year = alias
                        ->selectRaw('month(published_at)  month')
                        ->selectRaw('monthname(published_at)  monthname')
                        ->selectRaw('count(*) posts')
                        ->groupBy('year', 'month', 'monthname')
                        //->orderBy('published_at')//deu erro mas funcionou sem isso!
                        ->get()//Raw para year ou month
        ];
        if (request()->wantsJson()) {
            return $data;
        }
        return view('pages.archive', $data);
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
