<?php

namespace App;

//use App\Category; //não precisa porque estão na mesma pasta
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $dates = ['published_at'];

    public function getRouteKeyName()//route by the name of the post
    {
        return 'url';//instead of 'title'; url or slug
    }
    public function category()//$post->category->name
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function scopePublished($query)//query builder
    {
        $query->whereNotNull('published_at')//exceto os com data nula
                        ->where('published_at', '<=', Carbon::now())
                        ->latest('published_at');
    }
}
