<template>
    <section class="post container">
        <div class="content-post">
            <post-header :post="post"></post-header>
            <div class="image-w-text" v-html="post.body"></div>

            <footer class="container-flex space-between">
                <social-links :description="post.title" />
                <div class="tags container-flex">
                    <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
                        <tag-link :tag="tag" />
                    </span>
                </div>
            </footer>
          <div class="comments">
            <div class="divider"></div>
            <disqus-comments />
          </div><!-- .comments -->
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                post: {
                    owner: {},
                    category: {}
                }
            }
        },
        mounted(){
        axios.get(`/api/blog/${this.$route.params.url}`)//url p post individual
            .then(res => {
                this.post = res.data;
                //console.log(res.data);
            })
            .catch(err => {
                console.log(err.response.data);
            })
        }
    }
</script>
