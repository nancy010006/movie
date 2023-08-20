<template>
  <div class="video-preview">
    <video
      ref="previewVideo"
      :src="videoPath"
      class="video"
      @mouseover="playPreview"
      @mouseout="pausePreview"
      loop
      muted
    ></video>
  </div>
</template>

<script>
export default {
  props: ['videoPath', 'previews'],
  methods: {
    async playPreview(event) {
      const videoElement = event.target;
      videoElement.currentTime = videoElement.duration / 2; // 將播放位置設置到影片中間
      try {
      await videoElement.play(); // 播放影片
      } catch (e) {
      }
    },
    pausePreview(event) {
      event.target.pause(); // 暫停影片
      event.target.currentTime = 0; // 將播放位置重置到開始
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