require('./bootstrap');

import Vue from 'vue';

import router from './routes';//arquivo routes.js criado; n precisa da ext .js; routes define as rotas
Vue.component('post-header', require('./components/PostHeader.vue'));
Vue.component('nav-bar', require('./components/NavBar.vue'));

const app = new Vue({
    el: '#app',
    router: router //nome da chave e valor iguais
});


