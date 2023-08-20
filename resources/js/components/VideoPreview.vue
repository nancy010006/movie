<template>
  <div class="video-preview">
    <video
      ref="previewVideo"
      :src="videoPath"
      class="video"
      @mouseover="playPreview"
      @mouseout="pausePreview"
      @loadedmetadata="onMetadataLoaded"
      loop
      muted
    ></video>
  </div>
</template>

<script>
export default {
  data() {
    return {
      canPlay: false,
    };
  },
  props: ['videoPath', 'previews'],
  methods: {
    onMetadataLoaded() {
      this.canPlay = true;
    },
    async playPreview(event) {
      if (!this.canPlay) return; // 如果元數據還未加載，不嘗試播放

      const videoElement = event.target;
      videoElement.currentTime = videoElement.duration / 2;
      try {
        await videoElement.play();
      } catch (e) {
      }
    },
    pausePreview(event) {
      event.target.pause();
      event.target.currentTime = 0;
    }
  }
};
</script>

<style scoped>
.video-preview {
  width: 100%;
  height: auto;
}

.video {
  width: 100%;
  height: auto;
  cursor: pointer;
}
</style>