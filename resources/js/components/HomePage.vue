<template>
  <div class="home-page">
    <search-bar></search-bar>
    <div class="movies">
      <div v-if="loading">Loading movies...</div>
      <div class="movie-card" v-for="movie in movies" :key="movie.id">
        <router-link :to="`/video/${encodeURIComponent(movie.video_path)}`"> <!-- 使用影片的 path -->
          <img v-if="movie.previews && movie.previews.length > 0" :src="movie.previews[0].image_path" alt="Movie poster" class="movie-image" />
          <h3 class="movie-title">{{ movie.title }}</h3>
          <p class="movie-description">{{ movie.description }}</p>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import SearchBar from './SearchBar.vue';

export default {
  name: 'HomePage',
  components: {
    SearchBar,
  },
  data() {
    return {
      loading: true,
      movies: [],
    };
  },
  mounted() {
    axios.get('http://127.0.0.1/mymovie/public/api/movies')
      .then(response => {
        this.movies = response.data;
        this.loading = false;
      })
      .catch(error => {
        console.error('An error occurred while fetching movies:', error);
        this.loading = false;
      });
  },
};
</script>

<style scoped>

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
