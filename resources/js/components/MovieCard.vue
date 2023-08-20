<template>
  <div class="movie-card">
    <router-link :to="{
      name: 'videoPage',
      params: { videoPath: encodeURIComponent(videoPath), id: id }
    }">
      <video-preview :video-path="videoPath" :previews="previews"></video-preview>
      <h3 class="movie-title">{{ title }}</h3>
    </router-link>
  </div>
</template>

<script>
import VideoPreview from './VideoPreview.vue';

export default {
  name: 'MovieCard',
  props: {
    videoPath: String,
    previews: Array,
    title: String,
    id: Number,
  },
  components: {
    VideoPreview,
  },
};
</script>

<style scoped>
.movie-card {
  width: 200px;
  margin: 15px;
  padding: 10px;
  border: 1px solid #ccc;
  text-align: center;
}

.movie-title {
  font-size: 18px;
}
</style>