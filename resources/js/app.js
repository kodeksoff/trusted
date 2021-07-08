require('./bootstrap');

import Vue from 'vue'
import store from './store'



Vue.component('login', require('./components/header/login').default)
Vue.component('mobile-menu', require('./components/header/mobile-menu').default)
Vue.component('mobile-menu-button', require('./components/header/mobile-menu-button').default)

const app = new Vue({
    store,
}).$mount('#app')
