<template>
  <div class="search-results-page">
    <navigation-bar></navigation-bar>
    <search-bar></search-bar>
    <h1>Search Result</h1>
    <div class="results">
      <div v-if="loading">Loading movies...</div>
      <movie-card
        v-for="movie in movies"
        :key="movie.id"
        :videoPath="movie.video_path"
        :previews="movie.previews"
        :title="movie.title"
        :id="Number(movie.id)"
      ></movie-card>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import SearchBar from './SearchBar.vue';
import MovieCard from './MovieCard.vue'; // 引入 MovieCard 組件
import { API_HOST } from '../config';
import NavigationBar from './NavigationBar.vue';

export default {
  name: 'SearchResultsPage',
  components: {
    SearchBar,
    MovieCard, // 加入 MovieCard 組件
    NavigationBar,
  },
  data() {
    return {
      loading: true,
      movies: [],
      query: this.$route.query.query || '',
    };
  },
  watch: {
    '$route.query.query': 'fetchResults',
  },
  mounted() {
    this.fetchResults();
  },
  methods: {
    fetchResults() {
      this.loading = true;
      this.query = this.$route.query.query || '';
      axios.get(`${API_HOST}/api/search?query=${this.query}`)
        .then(response => {
          this.movies = response.data;
          this.loading = false;
        })
        .catch(error => {
          console.error('An error occurred while fetching search results:', error);
          this.loading = false;
        });
    },
  },
};
</script>

<style scoped>
.results {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

</style>
