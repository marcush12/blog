<template>
    <section class="posts container">
        <!-- @if(isset($title))
            <h3>{{ $title }}</h3>
        @endif-->
            <!-- v-for é um loop foreach para vue: -->
            <posts-list-item
                v-for="post in posts"
                :post="post"
                :key="post.id">

            </posts-list-item>

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
