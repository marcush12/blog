<?php

namespace App;

//use App\Category; //não precisa porque estão na mesma pasta
use App\Tag;
use App\User;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 'user_id'
    ];
    protected $dates = ['published_at'];
    protected $appends = ['published_date'];//criar função assessor getPublishedDate

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
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopePublished($query)//query builder
    {
        $query->with(['owner', 'category', 'tags', 'photos'])
                        ->whereNotNull('published_at')//exceto os com data nula
                        ->where('published_at', '<=', Carbon::now())
                        ->latest('published_at');
    }
    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this)) {
            return $query;
        }
        return $query->where('user_id', auth()->id());
    }
    // public function scopeByYearAndMonth($query)//não funcionou!
    // {
    //    return $query->selectRaw('year(published_at)  year')//as year = alias
    //          ->selectRaw('month(published_at)  month')
    //          ->selectRaw('monthname(published_at)  monthname')
    //          ->selectRaw('count(*) posts')
    //          ->groupBy('year', 'month', 'monthname')
    //          //->orderBy('published_at')//deu erro mas funcionou sem isso!
    //          ->get();//Raw para year ou month
    // }
    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }
    // public function setTitleAttribute($title)
    // {
    //     $this->attributes['title'] = $title;
    //     $originalUrl = $url = str_slug($title);
    //     $count = 1;
    //     while (Post::where('url', $url)->exists()) {
    //         $url = "{$originalUrl}-" . ++$count;
    //     }
    //     $this->attributes['url'] = $url;
    // }
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
    public function getPublishedDateAttribute()//assessor: camel case; ultima palavra Attribute
    {
        return optional($this->published_at)->format('M d');
    }
    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();
        $post = static::query()->create($attributes);
        $post->generateUrl();
        return $post;
    }
    public function generateUrl()
    {
        $url = str_slug($this->title);
        if ($this->where('url', $url)->exists()) {//poderia ser whereUrl($url)
            $url = "{$url}-{$this->id}";
        }
        $this->url = $url;
        $this->save();
    }
}
