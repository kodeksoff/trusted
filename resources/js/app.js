require('./bootstrap');

import Vue from 'vue'
import store from './store'

Vue.component('user-card', require('./components/header/user-card').default)
Vue.component('login-dropdown', require('./components/header/login-dropdown').default)
Vue.component('mobile-menu', require('./components/header/mobile-menu').default)
Vue.component('mobile-menu-button', require('./components/header/mobile-menu-button').default)

Vue.component('register-page', require('./components/pages/register').default)

const app = new Vue({
    store,
}).$mount('#app')



const usrBtn = document.getElementById('user-menu-button')
const usrPopup = document.getElementById('user-menu-popup')

usrBtn.addEventListener('click', () => {
    usrPopup.classList.toggle('hidden')
})

usrPopup.addEventListener('mouseleave', () => {
    usrPopup.classList.toggle('hidden')
})
