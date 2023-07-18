<template>
    <!-- 搜尋菜單 -->
    <!-- <input
        type="text"
        class="search"
        placeholder="請輸入商品名稱"
        v-model="searchText"
        @input="searchFilter(searchText)"
    /> -->
    <div class="main_wrap">
        <!-- 選單 -->
        <aside class="selectmain">
            <!-- 菜色分類 -->
            <div class="select_bar">
                <button class="item">主菜</button>
                <button class="item">湯品</button>
                <button class="item">沙拉</button>
            </div>
            <!-- 不包含的食材 -->
            <div class="select_adjust">
                <button class="btn_s">
                    <i class="fa-solid fa-sliders"></i>
                </button>
                <div class="hatefood">
                    <p class="title">不包含的食材</p>
                    <div class="cant">
                        <button>ccc</button>
                    </div>
                    <p class="text">
                        如果您有不食用上述以外的食材，請<a href="#">聯繫我們</a
                        >，謝謝。
                    </p>
                    <div class="adjust_btn">
                        <button class="cross btn_s">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <button class="down btn_s">設定完成</button>
                    </div>
                </div>
            </div>
        </aside>
        <!-- 菜色選擇 -->
        <section class="info">
            <div class="food_pic">
                <img :src="productList[0].img" alt="food" />
            </div>
            <div class="row">
                <section class="container col-6 col-md-4">
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
                </section>
                <section class="container col-6 col-md-4">
                    <h4 class="menu_title" v-show="soupFilter.length > 0">
                        湯品 SOUP
                    </h4>
                    <div class="wrap_main_dish">
                        <div
                            class="card"
                            v-for="(item, index) in soupFilter"
                            :key="index"
                        >
                            <div class="pic">
                                <img :src="item.img" />
                            </div>
                            <h3>{{ item.name }}</h3>
                            <div class="btn_scd_s">選購</div>
                        </div>
                    </div>
                </section>
                <section class="container col-6 col-md-4">
                    <h4 class="menu_title" v-show="saladFilter.length > 0">
                        沙拉 SALAD
                    </h4>
                    <div class="wrap_main_dish">
                        <div
                            class="card"
                            v-for="(item, index) in saladFilter"
                            :key="index"
                        >
                            <div class="pic">
                                <img :src="item.img" />
                            </div>
                            <h3>{{ item.name }}</h3>
                            <div class="btn_scd_s">選購</div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <!-- 清單、結帳按鈕 -->
        <aside class="choose">
            <div class="shop_btn">
                <button class="list_btn btn_s">
                    <i class="fa-solid fa-box-open"></i>
                </button>
                <button class="checkout_btn btn_s">結帳</button>
            </div>
        </aside>
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
        //搜尋菜單
        searchFilter(text) {
            let result = this.productList.filter((item) => {
                return item.name.includes(text);
            });
            this.searchList = result;
        },
    },
};
</script>
<style scoped lang="scss">
@import "@/assets/scss/page/shop.scss";
</style>
