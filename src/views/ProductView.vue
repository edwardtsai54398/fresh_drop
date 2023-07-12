<template>
    <div class="container product_container">
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
                    <p>{{ newProduct.des }}</p>
                </div>
            </div>
            <article>
                <div>
                    <h2>材料【2人份】</h2>
                    <div class="wrap">
                        <p class="ingred" v-for="(item, index) in newProduct.ingred" :key="index">
                            {{ item }}
                        </p>
                    </div>
                </div>
                <div>
                    <h2>步驟</h2>
                    <ol class="wrap">
                        <li v-for="(step, index) in newProduct.step" :key="index">
                            <span class="number">{{ index + 1 }}</span>
                            <div class="title_border">
                                <p class="title">{{ step.title }}</p>
                            </div>
                            <ul>
                                <li v-for="(subStep, subIndex) in step.step" :key="subIndex">
                                    <p class="info">{{ subStep }}</p>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </div>
                <div>
                    <h2>過敏原</h2>
                    <div class="wrap">
                        <p class="allergy" v-for="(item, index) in newProduct.allergy" :key="index">
                            {{ item }}
                        </p>
                    </div>
                </div>
            </article>
        </section>
        <aside>
            <div class="hot_ranking">
                <div class="hot_title">
                    <img src="../assets/images/product/crown.svg" alt="" />
                    熱門推薦
                </div>
                <div class="hot_product" v-for="item in productList" :key="item.id" @click="update(item)">
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
    </div>
</template>

<script>
import productList from "@/assets/data/productList.js";
export default {
    data() {
        return {
            newProduct: productList[0],
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
