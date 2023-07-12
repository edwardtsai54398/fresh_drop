<template>
  <header class="mainheader">
    <button class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="logo">
      <router-link to="/"><h1>鮮食空投箱 Fresh Drop</h1></router-link>
    </div>
    <nav class="">
      <router-link to="/about">關於我們</router-link>
      <router-link to="/source">食材溯源</router-link>
      <router-link to="/shop">菜色選購</router-link>
      <router-link to="/shop">禮物卡</router-link>
      <router-link to="/shop">FAQ</router-link>
    </nav>
    <button class="member">
        <img src="@/assets/images/icon_bg/header_member.svg" alt="">
    </button>
  </header>
</template>

<script>
export default {};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/header.scss";
</style>