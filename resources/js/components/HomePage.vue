<template>
  <div class="home-page">
    <search-bar></search-bar>
    <div class="movies">
      <div v-if="loading">Loading movies...</div>
      <movie-card
        v-for="movie in movies"
        :key="movie.id"
        :videoPath="movie.video_path"
        :previews="movie.previews"
        :title="movie.title"
        :id="movie.id"
      ></movie-card>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import SearchBar from './SearchBar.vue';
import MovieCard from './MovieCard.vue'; // 引入 MovieCard 組件
import { API_HOST } from '../config';

export default {
  name: 'HomePage',
  components: {
    SearchBar,
    MovieCard, // 加入 MovieCard 組件
  },
  data() {
    return {
      loading: true,
      movies: [],
    };
  },
  mounted() {
    axios.get(`${API_HOST}/api/movies`)
      .then(response => {
        this.movies = response.data;
        this.loading = false;
      })
      .catch(error => {
        console.error('An error occurred while fetching movies:', error);
        this.loading = false;
      });
  }
};
</script>

<style scoped>
.movies {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
</style>
