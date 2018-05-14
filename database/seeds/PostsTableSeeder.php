<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //vamos criar posts
        Post::truncate();//limpa a tabela e cria o post abaixo
        Category::truncate();
        Tag::truncate();

        $category = new Category;
        $category->name = 'BJ';
        $category->save();

        $category = new Category;
        $category->name = 'Swallow';
        $category->save();

        $category = new Category;
        $category->name = 'DT';
        $category->save();



        $post = new Post;
        $post->title = "My first money";
        $post->url = str_slug("My first money");
        $post->excerpt = 'It was a beautiful afternoon and then';
        $post->body = "<p>Lorem ipsum turpis praesent scelerisque sed mollis, suspendisse inceptos ullamcorper amet nullam, neque per cras at porttitor</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();
        $post->tags()->attach(Tag::create(['name'=>'tag1']));

        $post = new Post;
        $post->title = "My first Swallow";
        $post->url = str_slug("My first Swallow");
        $post->excerpt = 'Suddenly he came and took me by surprise';
        $post->body = "<p>Lorem ipsum turpis praesent scelerisque sed mollis, suspendisse inceptos ullamcorper amet nullam, neque per cras at porttitor</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();
        $post->tags()->attach(Tag::create(['name'=>'tag2']));

        $post = new Post;
        $post->title = "My first DT";
        $post->url = str_slug("My first DT");
        $post->excerpt = 'I put it all in mouth';
        $post->body = "<p>Lorem ipsum turpis praesent scelerisque sed mollis, suspendisse inceptos ullamcorper amet nullam, neque per cras at porttitor</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 3;
        $post->user_id = 2;
        $post->save();
        $post->tags()->attach(Tag::create(['name'=>'tag3']));
    }
}
