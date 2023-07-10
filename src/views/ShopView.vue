<template>
<<<<<<< HEAD
  <h1>This is an shop page</h1>
  <!-- <script>
export default {
  data() {
    return {}
  },
  methods: {}
}
</script>
<div class="wrap_main_dish">
=======
    <div class="wrap_main_dish">
>>>>>>> 10649441abd384f0f8e39352c6a3754c95677c79
        <div class="card" v-for="(item,index) in productList" :key="index">
            <div class="pic">
                <img :src="item.img">
            </div>
            <h3>{{ item.name }}</h3>
            <div class="btn_scd_s">選購</div>
        </div>
    </div> -->
</template>
<<<<<<< HEAD
<!-- <script>
=======
<script>
import productList from '@/assets/data/productList.js'
>>>>>>> 10649441abd384f0f8e39352c6a3754c95677c79
export default {
data() {
        return {
                productList,
        }
},
methods: {}
}
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/shop.scss";
</style>  -->
