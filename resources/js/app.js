require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import router from './routes'
import axios from 'axios'

Vue.use(VueRouter);
Vue.prototype.$http = axios;
Vue.config.productionTip = false;
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    render:h => h(App),
    router
});
