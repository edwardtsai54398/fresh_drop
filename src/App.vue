<template>

  <!-- <MainHeader></MainHeader>   -->
  <nav>
    <router-link to="/">fresh drop</router-link> |
    <router-link to="/shop">SHOP</router-link> |
    <router-link to="/login">Log in</router-link>
  </nav>
  <main><router-view/></main>
  <!-- <MainFooter></MainFooter>   -->
</template>
<script>
//有component在這裡 import
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'HomeView',
  components: {
    HelloWorld
  }
}
</script>


<style lang="scss">
@import "@/assets/scss/all.scss";
</style>
