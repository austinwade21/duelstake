/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./bootstrap');

import App from "./App";
import router from './router';
import store from './store';
import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'https://duelstake.com/';

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Filters

Vue.filter("oneDecimal", function (value) {
    return (Math.round(parseFloat(value) * 100) / 100).toFixed(1);
});

Vue.filter("eightDecimal", function (value) {
    return parseFloat(value).toFixed(8);
});

Vue.filter("toLocalTimeString", function (value) {
    var d = new Date(value);
    return d.toLocaleTimeString();
});

export const EventBus = new Vue();

store.dispatch('auth/me').then(() => {
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount('#app')
});

// const app = new Vue({
//     router,
//     store,
//     el: '#app',
//     components: { App },
//     render: h => h(App)
// });

