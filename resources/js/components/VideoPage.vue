<template>
  <div>
    <search-bar></search-bar>
    <div class="video-page-container">
      <main-video :videoSrc="videoSrc"></main-video>
      <suggested-videos></suggested-videos>
    </div>
    <video-tags :tags="videoDetails.tags"></video-tags>
    <video-actors :actors="videoDetails.actors"></video-actors>
    <video-history></video-history>
  </div>
</template>

<script>
import axios from 'axios';
import SearchBar from './SearchBar.vue';
import MainVideo from './MainVideo.vue';
import SuggestedVideos from './SuggestedVideos.vue';
import VideoTags from './VideoTags.vue';
import VideoActors from './VideoActors.vue';
import VideoHistory from './VideoHistory.vue';
import { API_HOST } from '../config';

export default {
  data() {
    return {
      videoDetails: null // 用於存儲從 API 獲取的影片詳細信息
    };
  },
  computed: {
    videoSrc() {
      return decodeURIComponent(this.$route.params.videoPath); // 將 URL 從路由參數中解碼
    }
  },
  mounted() {
    // 獲取 URL 中的 id 參數
    const videoId = this.$route.params.id;

    // 發送 API 請求以獲取影片詳細信息
    axios.get(`${API_HOST}/api/movie/${videoId}`)
      .then(response => {
        this.videoDetails = response.data;
      })
      .catch(error => {
        console.error('An error occurred while fetching video details:', error);
      });
  },
  methods: {
    getVideoDetails(videoId) {
        return 1;
    }
  },
  components: {
    SearchBar,
    MainVideo,
    SuggestedVideos,
    VideoTags,
    VideoActors,
    VideoHistory
  },
}
</script>
