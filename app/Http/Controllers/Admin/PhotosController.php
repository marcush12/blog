<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo'=>'required|image|max:2048' //jpg gif etc
        ]);
        $photo = request()->file('photo')->store('public');//via ajax dropzone
        //$photoUrl = $photo->store('posts');//p armazenar em public/img/posts
        Photo::create([
            'url'=>Storage::url($photo),
            'post_id'=>$post->id
        ]);
    }
}
