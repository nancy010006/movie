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
      this.$store.commit('updateQuery', actorName); // 更新 Vuex 的查詢字串
      this.$router.push({ name: 'SearchResults', query: { query: actorName } }); // 觸發搜索
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
