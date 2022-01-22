import Vue from 'vue'
import App from './App.vue'
import VueRouter from "vue-router";
import routes from './routes';
Vue.use(VueRouter);


const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
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


import Toast from "vue-toastification";
import 'vue-toastification/dist/index.css';
Vue.use(Toast, {
    rtl: true,
    position : 'top-center'
});

Vue.config.productionTip = false;

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')
