<template>
  <div class="main-video">
    <video ref="videoPlayer" class="video-js" controls></video>
  </div>
</template>

<script>
import 'video.js/dist/video-js.css';
import videojs from 'video.js';

export default {
  mounted() {
    const player = videojs(this.$refs.videoPlayer, {
      controls: true,
      sources: [
        { type: 'video/mp4', src: 'http://local.resources/videos/uccu0323_3172327330899320080.mp4' }
      ]
    });

    // 添加鍵盤快捷鍵事件
    player.on('keydown', (e) => {
      if (e.key === 'ArrowRight') {
        player.currentTime(player.currentTime() + 5);
      } else if (e.key === 'ArrowLeft') {
        player.currentTime(player.currentTime() - 5);
      }else if (e.code === 'Space') { // 空白鍵控制播放和暫停
        if (player.paused()) {
          player.play();
        } else {
          player.pause();
        }
      } else if (e.code === 'ArrowUp') { // 上箭頭鍵控制增加音量
        player.volume(Math.min(player.volume() + 0.1, 1));
      } else if (e.code === 'ArrowDown') { // 下箭頭鍵控制減小音量
        player.volume(Math.max(player.volume() - 0.1, 0));
      }
    });
  }
};
</script>

<style>
/* 如果需要，可以在這裡添加一些樣式 */
</style>
