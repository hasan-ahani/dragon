import Vue from 'vue'
import Admin from './Admin.vue'
import VueRouter from "vue-router";
import routes from './routes';
Vue.use(VueRouter);


const router = new VueRouter({
    mode: "history",
    base: '/admin/',
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

import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
Vue.use(VuePersianDatetimePicker, {
    name: 'custom-date-picker',
    props: {
        format: 'YYYY-MM-DD HH:mm',
        displayFormat: 'jYYYY-jMM-jDD HH:mm',
        editable: false,
        inputClass: 'form-control',
        placeholder: 'Please select a date',
        altFormat: 'YYYY-MM-DD HH:mm',
        color: '#00acc1',
        autoSubmit: false
    }
});

Vue.config.productionTip = false;

new Vue({
    router,
    render: h => h(Admin),
}).$mount('#app')
