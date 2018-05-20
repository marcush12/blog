<template>
    <section class="posts container">
        <!-- @if(isset($title))
            <h3>{{ $title }}</h3>
        @endif-->
            <!-- v-for é um loop foreach para vue: -->
            <article v-for="post in posts" class="post">
                <!-- @if($post->photos->count() ===1)
                    @include('posts.photo')
                @elseif($post->photos->count() > 1)
                mostrar somente as 4 primeiras fotos take(4)
                @include('posts.carousel-preview')
                @elseif($post->iframe)
                    @include('posts.iframe')
                @endif -->
                <div class="content-post">
                    <!-- @include('posts.header') -->
                    <!-- <h1>{{$post->title}}</h1> -->
                    <!-- tag p mostrar conteúdo de cada rota: -->
                    <h1 v-text="post.title"></h1>
                    <div class="divider"></div>
                    <p v-html="post.excerpt"></p>
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <!-- <a href="{{route('posts.show', $post)}}" class="text-uppercase c-green">ler mais</a> -->
                        </div>
                        <!-- @include('posts.tags') -->
                    </footer>
                </div>
            </article>
        <!-- @empty -->
            <article class="post" v-if="! posts.length">
                <div class="content-post">
                    <h1>Nenhum post publicado aqui.</h1>
                </div>
            </article>
        <!-- @endforelse -->
    </section><!-- fin del div.posts.container -->
    <!-- importante: deve haver apenas um unico elemento dentro da tag template, no caso temos section -->
</template>
<script>
    export default{
        data(){
            return {
                posts: []
            }
        },
        mounted() {//dispara automaticamente
            axios.get('/api/posts')//chamado de ajax para a url//route em api - obrigatorio ter prefixo api/
                .then(res => {//se houver êxito executa
                    this.posts = res.data.data;//this se refere a posts acima em data{}
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
</script>
