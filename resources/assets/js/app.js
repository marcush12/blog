require('./bootstrap');

import Vue from 'vue';

import Router from 'vue-router';

Vue.use(Router);
let router = new Router({
    routes: [
        {
            path: '/',
            component: require('./views/Home')//endereço da Home.vue a partir daqui; somente Home sem ext .vue
        },
        {
            path: '/about',
            component: require('./views/About')
        },
        {
            path: '/archive',
            component: require('./views/Archive')
        },
        {
            path: '/contact',
            component: require('./views/Contact')
        }
    ],
    linkExactActiveClass: 'active'//,//já temos esta classe e vamos aplicá-la a classe do router-link
    //linkExactClass: 'active-route',
});

const app = new Vue({
    el: '#app',
    router: router //nome da chave e valor iguais
});


