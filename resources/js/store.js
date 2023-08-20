import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        query: ''
    },
    mutations: {
        updateQuery(state, query) {
            state.query = query;
        },
        clearQuery(state) {
            state.query = ''; // 清除查詢
        }
    }
});
