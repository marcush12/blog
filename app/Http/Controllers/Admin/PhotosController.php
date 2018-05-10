<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo'=>'required|image|max:2048' //jpg gif etc
        ]);
        $photo = request()->file('photo');
    }
}
