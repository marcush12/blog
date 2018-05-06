<?php

namespace App;

//use App\Category; //não precisa porque estão na mesma pasta
use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    public function category()//$post->category->name
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
