<template>
  <div>
    <search-bar></search-bar>
    <div class="video-page-container">
      <main-video></main-video>
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
  components: {
    SearchBar,
    MainVideo,
    SuggestedVideos,
    VideoDetails,
    VideoHistory
  }
}
</script>
