<template>
  <div class="home-page">
    <search-bar></search-bar>
    <div class="movies">
      <div v-if="loading">Loading movies...</div>
      <div class="movie-card" v-for="movie in movies" :key="movie.id">
        <router-link :to="{
          name: 'videoPage',
          params: { videoPath: encodeURIComponent(movie.video_path), id: movie.id }
        }">
          <video-preview :video-path="movie.video_path" :previews="movie.previews"></video-preview>
          <h3 class="movie-title">{{ movie.title }}</h3>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import SearchBar from './SearchBar.vue';
import VideoPreview from './VideoPreview.vue';
import { API_HOST } from '../config';

export default {
  name: 'HomePage',
  components: {
    SearchBar,
    VideoPreview,
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

.movie-video {
  width: 100%;
  height: auto;
  cursor: pointer;
}

.movies {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.movie-card {
  width: 200px;
  margin: 15px;
  padding: 10px;
  border: 1px solid #ccc;
  text-align: center;
}

.movie-image {
  width: 100%;
  height: auto;
}

.movie-title {
  font-size: 18px;
}

.movie-description {
  font-size: 14px;
}
</style>
