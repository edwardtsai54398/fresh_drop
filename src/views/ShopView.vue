<template>
    <input
        type="text"
        class="search"
        placeholder="請輸入商品名稱"
        v-model="searchText"
        @input="searchFilter(searchText)"
    />
    <div class="container">
        <h4 class="menu_title" v-show="mainDishFilter.length > 0">
            主菜 MAIN DISH
        </h4>
        <div class="wrap_main_dish">
            <div
                class="card"
                v-for="(item, index) in mainDishFilter"
                :key="index"
            >
                <div class="pic">
                    <img :src="item.img" />
                </div>
                <h3>{{ item.name }}</h3>
                <div class="btn_scd_s">選購</div>
            </div>
        </div>
    </div>
    <div class="container">
        <h4 class="menu_title" v-show="soupFilter.length > 0">湯品 SOUP</h4>
        <div class="wrap_main_dish">
            <div class="card" v-for="(item, index) in soupFilter" :key="index">
                <div class="pic">
                    <img :src="item.img" />
                </div>
                <h3>{{ item.name }}</h3>
                <div class="btn_scd_s">選購</div>
            </div>
        </div>
    </div>
    <div class="container">
        <h4 class="menu_title" v-show="saladFilter.length > 0">沙拉 SALAD</h4>
        <div class="wrap_main_dish">
            <div class="card" v-for="(item, index) in saladFilter" :key="index">
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
            searchText: "",
            searchList: productList,
        };
    },
    computed: {
        mainDishFilter() {
            let filterResult = [];
            this.searchList.forEach((item, index) => {
                if (item.category == "主菜") {
                    filterResult.push(this.searchList[index]);
                }
            });

            return filterResult;
        },
        soupFilter() {
            let filterResult = [];
            this.searchList.forEach((item, index) => {
                if (item.category == "湯品") {
                    filterResult.push(this.searchList[index]);
                }
            });

            return filterResult;
        },
        saladFilter() {
            let filterResult = [];
            this.searchList.forEach((item, index) => {
                if (item.category == "沙拉") {
                    filterResult.push(this.searchList[index]);
                }
            });

            return filterResult;
        },
    },
    methods: {
        searchFilter(text) {
            let result = this.productList.filter((item) => {
                return item.name.includes(text);
            });
            this.searchList = result;
        },
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/page/shop.scss";
</style>
