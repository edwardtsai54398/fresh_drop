<template>
<<<<<<< HEAD
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <MainHeader></MainHeader>   -->
  <nav>
    <router-link to="/">fresh drop</router-link> |
    <router-link to="/shop">SHOP</router-link> |
    <router-link to="/login">Log in</router-link>|
    <router-link to="/product">ProductDetail</router-link>|
    <router-link to="/game">Game</router-link>|
    <router-link to="/faq">FAQ</router-link>
  </nav>
  <main><router-view /></main>
  <!-- <MainFooter></MainFooter>   -->
  <!-- <HelloWorld></HelloWorld>    -->
  <!-- 沒加上面這行npm run serve會報錯 GPT說是偵測引入了未使用的組件引起 -->
=======
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <MainHeader @toggle="isModalOpen = !isModalOpen"></MainHeader>
  <loginModal :isopen="isModalOpen" @close="isModalOpen = false"></loginModal>

  <main><router-view/></main>

  <MainFooter></MainFooter>  
>>>>>>> dev
</template>
<script>
import MainHeader from '@/components/MainHeader.vue';
import MainFooter from '@/components/MainFooter.vue';
import loginModal from '@/components/loginModal.vue';

export default {
  name: 'HomeView',
  components: {
    MainHeader,
    MainFooter,
    loginModal,
  },
  data() {
    return {
      isModalOpen: false,
    };
  },
}
</script>


<style lang="scss">
@import "@/assets/scss/all.scss";
</style>
