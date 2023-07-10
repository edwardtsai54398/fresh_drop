<template>
    <section>
        <div class="pro_header">
            <button class="btn_s btn_left">
                <span>back</span>
                <i class="fa-sharp fa-solid fa-arrow-left"></i>
            </button>
            <div class="title">
                <div class="type">
                    <span>{{ newProduct.catagory }}</span>
                </div>
                {{ newProduct.name }}
            </div>
        </div>
        <div class="pro_info">
            <div class="pic">
                <img :src="newProduct.img" alt="product" />
            </div>
            <div class="text">
                <p>
                    泰式綠咖哩是一道充滿活力的料理，融合了辣味、椰奶和豐富的蔬菜，每一口都散發出獨特的香料風味，讓你彷彿置身於泰國的街頭小吃攤位。讓這道菜成為你生活中的一部分，帶給你愉悅的味覺體驗！
                </p>
            </div>
        </div>
    </section>
    <aside>
        <div class="hot_ranking">
            <div class="hot_title">
                <img src="../assets/images/product/crown.svg" alt="" />
                熱門推薦
            </div>
            <div
                class="hot_product"
                v-for="item in productList"
                :key="item.id"
                @click="update(item)"
            >
                <div class="pic">
                    <img :src="item.img" alt="" />
                </div>
                <div class="hot_info">
                    <div class="hot_type">{{ item.catagory }}</div>
                    <div class="hot_name">{{ item.name }}</div>
                </div>
            </div>
        </div>
    </aside>
</template>
<script>
import productList from "@/assets/data/productList.js";
export default {
    data() {
        return {
            newProduct: {
                name: "泰式綠咖哩",
                catagory: "主菜",
                img: require("@/assets/images/product/10.jpg"),
            },
            productList,
        };
    },
    methods: {
        update(item) {
            this.newProduct = { ...item };
            // console.log(newProduct);
        },
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/product.scss";
</style>
