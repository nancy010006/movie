<!-- NavigationBar.vue -->
<template>
  <div class="navigation">
    <a @click="goToHomePage" class="home-button">首頁</a>
  </div>
</template>

<script>
export default {
  methods: {
    goToHomePage() {
      this.$store.commit('clearQuery'); // 使用 Vuex 的 mutation 清除查詢
      this.$router.push({ name: 'HomePage' }); // 使用具名路由跳轉到首頁
    }
  }
};
</script>

<style>
  .home-button {
    position: absolute;
    top: 10px;
    left: 10px;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    color: #000;
  }
</style>
