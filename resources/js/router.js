import Vue from 'vue';
import VueRouter from 'vue-router';
import HomePage from './components/HomePage.vue';

Vue.use(VueRouter);

const routes = [
    { path: '/', component: HomePage },
    // 其他路由
];

const router = new VueRouter({
    mode: 'history',
    base: '/mymovie/public/', // 與 Laravel 路由匹配的基礎路徑,
    routes
});

export default router;