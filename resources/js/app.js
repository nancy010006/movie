require('./bootstrap');
import router from './router';

window.Vue = require('vue').default;

Vue.component('home-page', require('./components/HomePage.vue').default);

import Vue from 'vue';
import VideoPlayer from 'vue-video-player';
// 需要 `video-player` 的樣式
import 'video.js/dist/video-js.css';

import store from './store'; // 確保路徑正確指向你的 store.js 文件

Vue.use(VideoPlayer);

const app = new Vue({
    el: '#app',
    store, // 加入 store
    router, // 將路由注入 Vue 實例
});
