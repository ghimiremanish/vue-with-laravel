/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import router from './route'
require('./bootstrap');

window.Vue = require('vue');

Vue.component('App', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
    router,
});

