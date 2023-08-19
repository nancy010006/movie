<template>
  <div class="home-page">
    <search-bar></search-bar>
    <div class="movies">
      <div v-if="loading">Loading movies...</div>
      <div class="movie-card" v-for="movie in movies" :key="movie.id">
        <router-link :to="`/video/${encodeURIComponent(movie.video_path)}`">
          <video
            ref="previewVideo"
            v-if="movie.previews && movie.previews.length > 0"
            :src="movie.video_path"
            class="movie-video"
            @mouseover="playPreview"
            @mouseout="pausePreview"
            loop
            muted
          ></video>
          <h3 class="movie-title">{{ movie.title }}</h3>
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
  methods: {
    playPreview(event) {
      const videoElement = event.target;
      videoElement.currentTime = videoElement.duration / 2; // 將播放位置設置到影片中間
      videoElement.play(); // 播放影片
    },
    pausePreview(event) {
      event.target.pause(); // 暫停影片
      event.target.currentTime = 0; // 將播放位置重置到開始
    }
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
