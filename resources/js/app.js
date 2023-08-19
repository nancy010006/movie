require('./bootstrap');
import router from './router';

window.Vue = require('vue').default;

Vue.component('home-page', require('./components/HomePage.vue').default);

const app = new Vue({
    el: '#app',
    router, // 將路由注入 Vue 實例
});
