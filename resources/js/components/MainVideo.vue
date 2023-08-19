<template>
  <div class="video-container">
    <div class="main-video">
      <video ref="videoPlayer" class="video-js" controls></video>
    </div>
    <!-- 你可以在這裡添加其他組件，例如建議的視頻列表 -->
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

<style scoped>
.video-container {
  display: flex;
  flex-direction: row;
}

.main-video {
  width: 50%; /* 設置寬度為50% */
}

.video-js {
  width: 100%;
  height: 0;
  padding-bottom: 56.25%; /* 16:9比例 */
  background-color: #000;
}
</style>