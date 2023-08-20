<template>
  <div class="video-actors">
    <div class="actors">
      <!-- 迴圈遍歷視頻演員 -->
      <div
        v-for="actor in actors"
        :key="actor.id"
        class="actor"
        @click="searchActor(actor.name)"
      >
        {{ actor.name }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['actors'], // 接收演員道具
  methods: {
    searchActor(actorName) {
      // 在此處觸發搜尋功能，可以通過發送事件或調用父組件方法實現
      // 以下是發送自定義事件的示例，你可以根據實際情況調整
      this.$emit('search', actorName);
    },
  },
};
</script>

<style scoped>
.video-actors {
  padding: 10px;
}

.actors {
  display: flex;
  flex-wrap: wrap;
}

.actor {
  padding: 5px 10px;
  margin: 5px;
  border: 1px solid #ccc;
  cursor: pointer;
}

.actor:hover {
  background-color: #f0f0f0;
}
</style>
