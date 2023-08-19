<template>
  <div class="home-page">
    <div class="header">
      <h1>Welcome to My Movie Site</h1>
      <input type="text" placeholder="Search movies..." class="search-box" />
    </div>
    <div class="movies">
      <div class="movie-card" v-for="movie in recommendedMovies" :key="movie.id">
        <img :src="movie.image" alt="Movie poster" class="movie-image" />
        <h3 class="movie-title">{{ movie.title }}</h3>
        <p class="movie-description">{{ movie.description }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomePage',
  data() {
    return {
      recommendedMovies: [
        // Example movies
        { id: 1, title: 'Movie 1', description: 'This is movie 1', image: 'path/to/image1.jpg' },
        { id: 2, title: 'Movie 2', description: 'This is movie 2', image: 'path/to/image2.jpg' },
        // Add more movies as needed
      ],
    };
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
