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
      // 帶入搜尋框並執行搜尋的邏輯
      // 你可能需要在這裡添加相應的邏輯，以便將標籤名稱帶入搜尋框並執行搜尋
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
