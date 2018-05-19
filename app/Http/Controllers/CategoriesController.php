<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts;
        return view('pages.home', [
            'title'=>"Posts com a categoria '$category->name'",//estamos no php apenas {}
            'posts'=> $category->posts()->paginate(15)
        ]);
    }
}
