import Vue from 'vue'
import Auth from './Auth.vue'
import VueRouter from "vue-router";
import './../../tailwind.css';

import VueMyToasts from 'vue-my-toasts'
import Toast from "../components/module/Toast";

Vue.use(VueMyToasts, {
    component: Toast,
    options: {
        width: '400px',
        position: 'top-middle',
        padding: '1rem',
    },
})

// axios
let opts = {
    baseURL: 'http://dragon.me/wp-json/dragon/v1/'
    // headers: {'X-Custom-Header': 'foobar'}
}

import axios from 'axios';
Vue.prototype.$request = axios.create(opts);

//router
import routes from './routes';
Vue.use(VueRouter);
const router = new VueRouter({
    mode: "history",
    base: '/auth/',
    routes,
    scrollBehavior: (to, from, savedPosition) => {
        if (savedPosition) {
            return savedPosition;
        } else if (to.hash) {
            return {
                selector: to.hash
            };
        } else {
            return { x: 0, y: 0 };
        }
    }
});
router.beforeEach((to, from, next) => {
    if( to.path == '/'){
        next( {
            path: 'login/',
        } );
    }else{
        next();
    }
})

import utils from './../assets/js/utils';

Vue.mixin({
    data() {
        return {
            utils,
            progress: false
        }
    }
})

Vue.config.productionTip = false;

new Vue({
    render: h => h(Auth),
    router
}).$mount('#app')
