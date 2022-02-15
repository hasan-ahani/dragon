import Vue from 'vue'
import Auth from './Auth.vue'



Vue.config.productionTip = false;

new Vue({
    render: h => h(Auth),
}).$mount('#app')
