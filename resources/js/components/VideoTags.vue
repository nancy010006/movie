<template>
  <div class="video-tags">
    <div class="tags">
      <!-- 迴圈遍歷視頻標籤 -->
      <div
        v-for="tag in tags"
        :key="tag.id"
        class="tag"
        @click="searchTag(tag.name)"
      >
        {{ tag.name }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['tags'], // 接收標籤道具

  methods: {
    searchTag(tagName) {
      this.$store.commit('updateQuery', tagName); // 更新 Vuex 的查詢字串
      this.$router.push({ name: 'SearchResults', query: { query: tagName } }); // 觸發搜索
    },
  },
};
</script>

<style scoped>
.video-tags {
  padding: 10px;
}

.tags {
  display: flex;
  flex-wrap: wrap;
}

.tag {
  padding: 5px 10px;
  margin: 5px;
  border: 1px solid #ccc;
  cursor: pointer;
  transition: background-color 0.3s;
}

.tag:hover {
  background-color: #f0f0f0;
}
</style>
