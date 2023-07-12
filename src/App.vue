<template>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <MainHeader></MainHeader>   -->
  <nav>
    <router-link to="/">fresh drop</router-link> |
    <router-link to="/shop">SHOP</router-link> |
    <router-link to="/login">Log in</router-link>|
    <router-link to="/product">ProductDetail</router-link>|
    <router-link to="/game">Game</router-link>
  </nav>
  <main><router-view /></main>
  <!-- <MainFooter></MainFooter>   -->
  <!-- <HelloWorld></HelloWorld>    -->
  <!-- 沒加上面這行npm run serve會報錯 GPT說是偵測引入了未使用的組件引起 -->
</template>
<script>
//有component在這裡 import
// import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'HomeView',
  components: {
    // HelloWorld
  }
}
</script>


<style lang="scss">
@import "@/assets/scss/all.scss";
</style>
