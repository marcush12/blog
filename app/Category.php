<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'url';
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // public function getNameAttribute($name)//accessor começa com get + nome p modificar + attribute
    // {
    //     return str_slug($name);
    // }
    public function setNameAttribute($name)//mutator começa com set
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
}
