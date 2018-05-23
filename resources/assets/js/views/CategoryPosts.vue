<template>
    <paginator
        :url="`/api/categorias/${this.$route.params.category}`"
        component-name="posts-list"
    />
</template>
<script>
    export default{
        props: ['category']
    }
</script>
