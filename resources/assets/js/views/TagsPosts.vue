<template>
    <posts-list :posts="posts"></posts-list>
</template>
<script>
    export default{
        props: ['tag'],
        data(){
            return {
                posts: []
            }
        },
        mounted() {//dispara automaticamente
            this.getPosts();
        },
        beforeRouteUpdate(to, from, next){
            this.tag = to.params.tag;
            this.getPosts();
            next();
        },
        methods: {
            getPosts(){
                return axios.get(`/api/etiquetas/${this.tag}`)
                    .then(res => {//se houver êxito executa
                        this.posts = res.data.data;//this se refere a posts acima em data{}
                    })
                    .catch(err => {
                        console.log(err);
                });
            }
        }
        // watch: {
        //     tag() {
        //         this.getPosts();
        //     }
        // }
    }
</script>
