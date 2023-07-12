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
    <nav :class="{ open: isToggleOpen }" @click="isToggleOpen = false">
      <router-link to="/about" >關於我們</router-link>
      <router-link to="/source">食材溯源</router-link>
      <router-link to="/shop">菜色選購</router-link>
      <router-link to="/giftcard">禮物卡</router-link>
      <router-link to="/faq">FAQ</router-link>
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
      // isModalOpen: false,
      
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