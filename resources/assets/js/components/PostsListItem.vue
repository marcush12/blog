<template>
    <article class="post">
                <div class="content-post">
                    <post-header :post="post"></post-header>
                    <!-- @include('posts.header') -->

                    <p v-html="post.excerpt"></p>
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <!-- :to substitui Href; `  ` usado para imprimir strings; ${variável} para variável
                            <router-link :to="`/blog/${post.url}`"-->
                            <post-link class="text-uppercase c-green" :post="post">Ler mais</post-link>
                        </div>
                        <div class="tags container-flex">
                                <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
                                    <tag-link :tag="tag" />
                                </span>
                        </div>

                    </footer>
                </div>
            </article>
</template>
<script>
    export default {
        props: ['post']
    }
</script>
