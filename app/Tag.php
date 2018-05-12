<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function getRouteKeyName()
    {
        return 'url';
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function setNameAttribute($name)//mutator começa com set
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
}
