import Vue from 'vue'
import App from './App.vue'

import VueRouter from "vue-router";
import './../../tailwind.css';

import { Notyf } from 'notyf';
import 'notyf/notyf.min.css'; // for React, Vue and Svelte

// Create an instance of Notyf
Vue.prototype.$notif = new Notyf({
    duration: 4000,
    position: {
        x: 'center',
        y: 'top',
    },
    dismissible: true,
    types: [
        {
            type: 'warning',
            background: '#FCD34D',
            icon: {
                className: 'material-icons',
                tagName: 'i',
                text: 'warning'
            }
        },
        {
            type: 'error',
            background: '#E81C4D'
        },
        {
            type: 'success',
            background: '#22C55E'
        },
        {
            type: 'info',
            background: '#3595F6',
        }
    ]
});

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
    base: '/dashboard/',
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


import utils from './../assets/js/utils';

Vue.mixin({
    data() {
        return {
            utils,
        }
    }
})

import dgInput from './../components/fields/dg-input.vue';
Vue.component(dgInput);
Vue.config.productionTip = false;
new Vue({
    router,
    render: h => h(App)
}).$mount('#app')
