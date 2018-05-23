import Vue from 'vue';

import Router from 'vue-router';

Vue.use(Router);
export default new Router({
    routes: [
        {
            path: '/',//rota
            name: 'home',//semelhante a web.php; nos leva a '/'
            component: require('./views/Home')//endereço da Home.vue a partir daqui; somente Home sem ext .vue
        },
        {
            path: '/about',
            name: 'about',
            component: require('./views/About')
        },
        {
            path: '/archive',
            name: 'archive',
            component: require('./views/Archive')
        },
        {
            path: '/contact',
            name: 'contact',
            component: require('./views/Contact')
        },
        {
            // rota para mostrar Posts individuais
            path: '/blog/:url',//:url vem de params da Home em router-link
            name: 'posts_show',
            component: require('./views/PostsShow')
        },
        {
            path: '/categorias/:category',
            name: 'category_posts',
            component: require('./views/CategoryPosts')
        },
        {
            path: '/etiquetas/:tag',
            name: 'tags_post',
            component: require('./views/TagsPosts'),
            props: true
        },
        {
            path: '*',//deixar esta rota p o final; é para aquelas q não têm os nome acima
            component: require('./views/404')
        }
    ],
    linkExactActiveClass: 'active',//,//já temos esta classe e vamos aplicá-la a classe do router-link
    //linkExactClass: 'active-route',
    scrollBehavior(){
        return {x:0, y:0};
    }
});
