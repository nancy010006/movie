import Vue from 'vue';
import VueRouter from 'vue-router';
import HomePage from './components/HomePage.vue';
import VideoPage from './components/VideoPage.vue';
import SearchResultsPage from './components/SearchResultsPage.vue';

Vue.use(VueRouter);

const routes = [
    { 
        path: '/',
        name: 'HomePage',
        component: HomePage,
    },
    {
        path: '/video/:videoPath/:id',
        name: 'videoPage',
        component: VideoPage,
    },
    {
        path: '/search',
        name: 'SearchResults',
        component: SearchResultsPage
    },
];

const router = new VueRouter({
    mode: 'history',
    base: '/mymovie/public/', // 與 Laravel 路由匹配的基礎路徑,
    routes
});

export default router;
