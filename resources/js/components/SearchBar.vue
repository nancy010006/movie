<template>
  <div class="header">
    <input type="text" v-model="query" placeholder="Search movies..." class="search-box" />
    <button @click="searchMovies" class="search-button">Search</button>
  </div>
</template>

<script>
export default {
  computed: {
    query: {
      get() {
        return this.$store.state.query; // 從 Vuex 獲取查詢
      },
      set(value) {
        this.$store.commit('updateQuery', value); // 將查詢保存到 Vuex
      }
    }
  },
  watch: {
    '$route.query.query': function(newVal) {
      this.query = newVal || ''; // 更新查詢字串，如果路由變更
    }
  },
  methods: {
    searchMovies() {
      this.$router.push({ name: 'SearchResults', query: { query: this.query } });
    },
  },
};
</script>

<style scoped>
  .search-box {
    width: 300px;
    padding: 10px;
    font-size: 16px;
  }

  .search-button {
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
  }

  .header {
    text-align: center;
    margin-bottom: 20px;
  }
</style>
