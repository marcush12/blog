<template>
    <div>
        <component :is="componentName" :items="items"></component>
        <pagination-links :pagination="pagination" />
    </div>
</template>
<script>
    export default {
        props: ['url', 'componentName'],
        data(){
            return {
                pagination: {},
                items: []
            }
        },
        mounted() {//dispara automaticamente
            axios.get(`${this.url}?page=${this.$route.query.page || 1}`)//chamado de ajax para a url//route em api - obrigatorio ter prefixo api/
                .then(res => {//se houver êxito executa
                    this.pagination = res.data;
                    this.items = res.data.data;//this se refere a posts acima em data{}
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
</script>
<style lang="scss">
    .pagination{
        a.active{
            background-color: #1abc9c;
            color: white;
        }
    }
</style>
