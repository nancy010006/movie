require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('home-page', require('./components/HomePage.vue').default);

const app = new Vue({
    el: '#app',
});
