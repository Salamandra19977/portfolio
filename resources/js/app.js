require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import router from './routes'
import axios from 'axios'

Vue.use(VueRouter);
Vue.prototype.$http = axios;
Vue.config.productionTip = false;

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

const app = new Vue({
    el: '#app',
    render:h => h(App),
    router
});
