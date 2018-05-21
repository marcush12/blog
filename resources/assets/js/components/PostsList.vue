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
                    <post-header :post="post"></post-header>
                    <!-- @include('posts.header') -->

                    <p v-html="post.excerpt"></p>
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <!-- :to substitui Href; `  ` usado para imprimir strings; ${variável} para variável
                            <router-link :to="`/blog/${post.url}`"-->
                            <router-link :to="{name: 'posts_show', params: {url: post.url}}"
                                class="text-uppercase c-green">
                                ler mais
                            </router-link>
                        </div>
                        <!-- @include('posts.tags') -->
                        <div class="tags container-flex">
                                <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
                                    <router-link :to="{name: 'tags_post', params: {tag: tag.url}}">
                                        #{{tag.name}}
                                    </router-link>
                                </span>
                        </div>

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
    export default {
        props: ['posts']
    }
</script>
