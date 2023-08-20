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
      <!-- 輸入框和按鈕用於添加新標籤 -->
      <input type="text" v-model="newTag" placeholder="新增標籤" />
      <button @click="addTag">添加標籤</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { API_HOST } from '../config';

export default {
  props: ['tags', 'movieId'], // 接收標籤道具
  data() {
    return {
      newTag: '', // 用於保存新標籤的數據繫結
    };
  },
  methods: {
    searchTag(tagName) {
      this.$store.commit('updateQuery', tagName); // 更新 Vuex 的查詢字串
      this.$router.push({ name: 'SearchResults', query: { query: tagName } }); // 觸發搜索
    },
    addTag() {
    const tagName = this.newTag;

    if (!tagName) {
      alert('標籤名不能為空！');
      return;
    }

    const movieId = this.movieId;
    axios
      .post(`${API_HOST}/api/movies/${movieId}/add-tag`, {
        tag: tagName,
      })
      .then((response) => {
        // 添加成功，可以更新你的界面或其他操作
        this.tags.push({ name: tagName });
        this.newTag = ''; // 清空輸入框
      })
      .catch((error) => {
        if (error.response.status === 409) {
          alert(error.response.data.message);
        } else {
          // 處理其他錯誤
        }
      });
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
