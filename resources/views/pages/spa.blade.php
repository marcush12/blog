@extends('layout')
@section('content')
    <section class="posts container">
        {{-- @if(isset($title))
            <h3>{{ $title }}</h3>
        @endif
        @forelse($posts as $post) --}}
            <article class="post">
                {{-- @if($post->photos->count() ===1)
                    @include('posts.photo')
                @elseif($post->photos->count() > 1)
                mostrar somente as 4 primeiras fotos take(4)
                @include('posts.carousel-preview')
                @elseif($post->iframe)
                    @include('posts.iframe')
                @endif --}}
                <div class="content-post">
{{--                     @include('posts.header') --}}
                    {{-- <h1>{{$post->title}}</h1> --}}
                    <div class="divider"></div>
                    {{-- <p>{{$post->excerpt}}</p> --}}
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            {{-- <a href="{{route('posts.show', $post)}}" class="text-uppercase c-green">ler mais</a> --}}
                        </div>
                        {{-- @include('posts.tags') --}}
                    </footer>
                </div>
            </article>
        {{-- @empty --}}
            <article class="post">
                <div class="content-post">
                    <h1>Nenhum post publicado aqui.</h1>
                </div>
            </article>
        {{-- @endforelse --}}
    </section><!-- fin del div.posts.container -->
@stop


