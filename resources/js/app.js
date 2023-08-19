require('./bootstrap');
import router from './router';

window.Vue = require('vue').default;

Vue.component('home-page', require('./components/HomePage.vue').default);

import Vue from 'vue';
import VideoPlayer from 'vue-video-player';
// 需要 `video-player` 的樣式
import 'video.js/dist/video-js.css';

Vue.use(VideoPlayer);

const app = new Vue({
    el: '#app',
    router, // 將路由注入 Vue 實例
});
