<template>
    <posts-list :posts="posts"></posts-list>
</template>
<script>
    export default{
        data(){
            return {
                posts: []
            }
        },
        mounted() {//dispara automaticamente
            axios.get(`/api/categorias/${this.$route.params.category}`)
                .then(res => {//se houver êxito executa
                    this.posts = res.data.data;//this se refere a posts acima em data{}
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
</script>
