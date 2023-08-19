<template>
  <div class="home-page">
    <div class="header">
      <h1>Welcome to My Movie Site</h1>
      <input type="text" placeholder="Search movies..." class="search-box" />
    </div>
    <div class="movies">
      <div v-if="loading">Loading movies...</div>
      <div class="movie-card" v-for="movie in movies" :key="movie.id">
        <img v-if="movie.previews && movie.previews.length > 0" :src="movie.previews[0].image_path" alt="Movie poster" class="movie-image" />
        <h3 class="movie-title">{{ movie.title }}</h3>
        <p class="movie-description">{{ movie.description }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'HomePage',
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
.header {
  text-align: center;
  margin-bottom: 20px;
}

.search-box {
  width: 300px;
  padding: 10px;
  font-size: 16px;
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
