<template>
  <header class="mainheader">
    <button class="hamburger" @click="isToggleOpen = !isToggleOpen">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="header_logo">
      <router-link to="/"><h1>鮮食空投箱 Fresh Drop</h1></router-link>
    </div>
    <!-- @click="isToggleOpen = false" -->
    <nav class="main_nav" 
    :class="{ open: isToggleOpen }" >
      <router-link to="/about"><h4>關於我們</h4></router-link>
      <div class="sub_toggle">
        <div class="subtoggle_btn" @click="isSubtoggleOpen = !isSubtoggleOpen">
          <h4>食材溯源</h4><i class="fa-solid fa-chevron-right"></i>
        </div>
        <nav class="sub_toggle_list" 
        :class="{open : isSubtoggleOpen}" >
          <div class="goback" 
          @click="isSubtoggleOpen = false">
          <i class="fa-solid fa-chevron-left"></i>
        </div>
          <router-link to="/source" 
          @click="isSubtoggleOpen = false; isToggleOpen = false">
            <h5>各地小農介紹</h5>
          </router-link>
          <router-link to="/meat" 
          @click="isSubtoggleOpen = false; isToggleOpen = false">
            <h5>安心肉品</h5>
          </router-link>
          <router-link to="/certified" 
          @click="isSubtoggleOpen = false; isToggleOpen = false">
            <h5>相關認證</h5>
          </router-link>
        </nav>
      </div>
      <router-link to="/shop"><h4>菜色選購</h4></router-link>
      <router-link to="/giftcard"><h4>禮物卡</h4></router-link>
      <router-link to="/faq"><h4>FAQ</h4></router-link>
      <router-link to="/game"><h4>今天吃什麼</h4></router-link>
    </nav>
    <button class="member" @click="$emit('toggle')">
      <img src="@/assets/images/icon_bg/header_member.svg" alt="" />
      <h4>會員登入</h4>
    </button>
  </header>
  
</template>

<script>

// import modalClose from '@/components/modalClose.vue'
export default {
  // name: 'modalClose',
  // components: {
  //   modalClose,
  // },
  data() {
    return {
      isToggleOpen: false,
      isSubtoggleOpen: false,
      
    };
  },
  methods: {
    login() {
      if (this.user.email === "test" && this.user.password === "test") {
        alert("登入成功");
      } else {
        alert("帳號或密碼錯誤，請再試一次");
      }
    },
  },
};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/header.scss";
</style>