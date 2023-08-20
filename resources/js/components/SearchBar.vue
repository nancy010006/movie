<template>
  <div class="header">
    <input type="text" v-model="query" placeholder="Search movies..." class="search-box" />
    <button @click="searchMovies" class="search-button">Search</button>
  </div>
</template>

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

<script>
export default {
  data() {
    return {
      query: '',
    };
  },
  methods: {
    searchMovies() {
      this.$router.push({ name: 'SearchResults', query: { query: this.query } });
    },
  },
};
</script>
