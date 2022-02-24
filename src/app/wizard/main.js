import Vue from 'vue'
import Wizard from './Wizard.vue'



Vue.config.productionTip = false;

new Vue({
    render: h => h(Wizard),
}).$mount('#app')
