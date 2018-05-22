require('./bootstrap');

import Vue from 'vue';

import router from './routes';//arquivo routes.js criado; n precisa da ext .js; routes define as rotas
Vue.component('post-header', require('./components/PostHeader'));
Vue.component('posts-list', require('./components/PostsList'));
Vue.component('posts-list-item', require('./components/PostsListItem'));
Vue.component('nav-bar', require('./components/NavBar'));
Vue.component('category-link', require('./components/CategoryLink'));
Vue.component('post-link', require('./components/PostLink'));
Vue.component('disqus-comments', require('./components/DisqusComments'));

const app = new Vue({
    el: '#app',
    router: router //nome da chave e valor iguais
});


