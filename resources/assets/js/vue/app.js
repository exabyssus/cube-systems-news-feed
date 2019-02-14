require('../bootstrap')

import Vue from 'vue'
import RegisterForm from './components/RegisterForm'

Vue.component('RegisterForm', RegisterForm)

const app = new Vue({
    el: '#app'
})
