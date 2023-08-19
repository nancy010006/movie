<template>
  <div>
    <search-bar></search-bar>
    <div class="video-page-container">
      <main-video :videoSrc="videoSrc"></main-video> <!-- 將 videoSrc 作為道具傳遞 -->
      <suggested-videos></suggested-videos>
    </div>
    <video-details></video-details>
    <video-history></video-history>
  </div>
</template>

<script>
import SearchBar from './SearchBar.vue';
import MainVideo from './MainVideo.vue';
import SuggestedVideos from './SuggestedVideos.vue';
import VideoDetails from './VideoDetails.vue';
import VideoHistory from './VideoHistory.vue';

export default {
  computed: {
    videoSrc() {
      return decodeURIComponent(this.$route.params.videoPath); // 將 URL 從路由參數中解碼
    }
  },
  components: {
    SearchBar,
    MainVideo,
    SuggestedVideos,
    VideoDetails,
    VideoHistory
  }
}
</script>
