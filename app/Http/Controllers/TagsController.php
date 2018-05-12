<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        return view('welcome', [
            'title'=>"Posts com a tag {$tag->name}",//apenas {} pq estamos no php
            'posts'=> $tag->posts()->paginate(1)
        ]);
    }
}
