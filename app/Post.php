<?php

namespace App;

//use App\Category; //não precisa porque estão na mesma pasta
use App\Tag;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id'
    ];
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
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function scopePublished($query)//query builder
    {
        $query->whereNotNull('published_at')//exceto os com data nula
                        ->where('published_at', '<=', Carbon::now())
                        ->latest('published_at');
    }
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }
    public function setPublishedAtAttribute($published_at)//mutator
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }
    public function setCategoryIdAttribute($category)//mutator
    {
        $this->attributes['category_id'] = Category::find($category)
                                ? $category
                                : Category::create(['name'=>$category])->id;
    }
    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function ($tag) {
            return Tag::find($tag) ? $tag : Tag::create(['name'=>$tag])->id;
        });
        return $this->tags()->sync($tagIds);
    }
}
