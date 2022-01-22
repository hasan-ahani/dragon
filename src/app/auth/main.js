import Vue from 'vue'
import Auth from './Auth.vue'


import Toast from "vue-toastification";
import 'vue-toastification/dist/index.css';
Vue.use(Toast, {
    rtl: true,
    position : 'top-center'
});

Vue.config.productionTip = false;

new Vue({
    render: h => h(Auth),
}).$mount('#app')
