import Vue from 'vue'
import System from './System.vue'
import './../../../public/assets/icon/dragon.css';
import './../../../public/assets/fonts.css';
import './../../sass/app.scss';


Vue.config.productionTip = false;

new Vue({
    render: h => h(System),
}).$mount('#app')
