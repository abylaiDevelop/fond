/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
import VueRouter from 'vue-router'

Vue.use(Vuetify)
Vue.use(VueRouter)

import 'vuetify/dist/vuetify.min.css'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin', require('./components/Admin.vue').default);

import Dashboard from './pages/Dashboard'
import Projects from './pages/Projects'
import Users from './pages/Users'
import Team from './pages/Team'
import News from './pages/News'
import Report from './pages/Report'
import MainSlider from './pages/MainSlider'
import Common from './pages/Common'

const routes = [
    {
        path: '/admin/',
        component: Dashboard
    },
    {
        path: '/admin/users',
        component: Users
    },
    {
        path: '/admin/news',
        component: News
    },
    {
        path: '/admin/main/slider',
        component: MainSlider
    },
    {
        path: '/admin/reports',
        component: Report
    },
    {
        path: '/admin/projects',
        component: Projects
    },
    {
        path: '/admin/common',
        component: Common
    },
    {
        path: '/admin/team',
        component: Team
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});

