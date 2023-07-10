<template>
    <h4 class="menu_title">主菜 MAIN DISH</h4>
    <div class="wrap_main_dish">
        <div class="card" v-for="(item,index) in mainDishFilter" :key="index">
            <div class="pic">
                <img :src="item.img">
            </div>
            <h3>{{ item.name }}</h3>
            <div class="btn_scd_s">選購</div>
        </div>
    </div>
    <h4 class="menu_title">湯品 SOUP</h4>
    <div class="wrap_main_dish">
        <div class="card" v-for="(item,index) in soupFilter" :key="index">
            <div class="pic">
                <img :src="item.img">
            </div>
            <h3>{{ item.name }}</h3>
            <div class="btn_scd_s">選購</div>
        </div>
    </div>
    <h4 class="menu_title">沙拉 SALAD</h4>
    <div class="wrap_main_dish">
        <div class="card" v-for="(item,index) in saladFilter" :key="index">
            <div class="pic">
                <img :src="item.img">
            </div>
            <h3>{{ item.name }}</h3>
            <div class="btn_scd_s">選購</div>
        </div>
    </div>
</template>
<script>
import productList from "@/assets/data/productList.js";
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
</style>
