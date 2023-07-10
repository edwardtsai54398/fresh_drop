<template>
    <div class="wrap_main_dish">
        <div class="wrap_main_dish">
            <div class="card" v-for="(item, index) in productList" :key="index">
                <div class="pic">
                    <img :src="item.img" />
                </div>
                <h3>{{ item.name }}</h3>
                <div class="btn_scd_s">選購</div>
            </div>
        </div>
    </div>
</template>
<script>
import productList from "@/assets/data/productList.js";
export default {
    data() {
        return {
            productList,
        };
    },
    methods: {},
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/shop.scss";
</style>
