<template>
    <div class="container product_container">
        <div class="main_wrap">
            <section class="main">
                <div class="main_title">
                    <button class="btn_s btn_left">
                        <span>back</span>
                        <i class="fa-sharp fa-solid fa-arrow-left"></i>
                    </button>
                    <div class="title">
                        <div class="type">
                            <span>{{ newProduct.category }}</span>
                        </div>
                        <h2>{{ newProduct.name }}</h2>
                    </div>
                </div>
                <div class="info_pic">
                    <div class="pic">
                        <img :src="newProduct.img" alt="product" />
                    </div>
                    <div class="text">
                        <p>{{ newProduct.des }}</p>
                    </div>
                </div>
                <article class="info_text">
                    <div>
                        <p>材料</p>
                        <div class="wrap">
                            <p
                                class="ingred"
                                v-for="(item, index) in newProduct.ingred"
                                :key="index"
                            >
                                {{ item }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <p>步驟</p>
                        <ol class="wrap">
                            <li
                                v-for="(step, index) in newProduct.step"
                                :key="index"
                            >
                                <span class="number">{{ index + 1 }}</span>
                                <div class="title_border">
                                    <p class="title">{{ step.title }}</p>
                                </div>
                                <ul>
                                    <li
                                        v-for="(subStep, subIndex) in step.step"
                                        :key="subIndex"
                                    >
                                        <p class="info">{{ subStep }}</p>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                    <div>
                        <p>過敏原</p>
                        <div class="wrap">
                            <p
                                class="allergy"
                                v-for="(item, index) in newProduct.allergy"
                                :key="index"
                            >
                                {{ item }}
                            </p>
                        </div>
                    </div>
                </article>
            </section>
            <aside class="recommend">
                <div class="hot_ranking">
                    <div class="hot_title">
                        <img
                            src="../assets/images/product/crown.svg"
                            alt="recommend pic"
                        />
                        熱門推薦
                    </div>
                    <div
                        class="hot_product"
                        v-for="(item, index) in filteredProductList"
                        :key="item.id"
                        @click="update(index)"
                    >
                        <div class="pic">
                            <img :src="item.img" alt="" />
                        </div>
                        <div class="hot_info">
                            <div class="hot_type">{{ item.category }}</div>
                            <div class="hot_name">{{ item.name }}</div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <section class="share">
            <div class="text">
                <p class="title">一起做</p>
                <button class="more" @click="toggleExpend">看更多</button>
            </div>
            <div class="cook row">
                <div
                    class="wrap col-6 col-md-3"
                    v-for="(item, index) in filteredProductShare"
                    :key="index"
                >
                    <div class="card">
                        <div class="pic pic_food">
                            <img :src="item.img[0]" alt="share_food" />
                        </div>
                        <div class="user">
                            <div class="wrap">
                                <div class="pic pic_people">
                                    <img
                                        :src="item.img[1]"
                                        alt="share_people"
                                    />
                                </div>
                                <div class="name">
                                    {{ item.name }}
                                </div>
                            </div>
                            <p class="message">{{ item.message }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn_l">上傳烹煮心得</div>
        </section>
        <div class="mask" v-show="isExpendVisible"></div>
        <section class="more_expend" v-show="isExpendVisible">
            <div class="title">
                <div class="type">
                    <span>{{ newProduct.category }}</span>
                </div>
                <h2>{{ newProduct.name }}</h2>
                <span>一起做</span>
            </div>
            <div class="content">
                <div class="row">
                    <div
                        class="card col-6 col-md-3"
                        v-for="(item, index) in productShare"
                        :key="index"
                    >
                        <div class="pic pic_food">
                            <img :src="item.img[0]" alt="share_food" />
                        </div>
                        <div class="user">
                            <div class="wrap">
                                <div class="pic pic_people">
                                    <img
                                        :src="item.img[1]"
                                        alt="share_people"
                                    />
                                </div>
                                <div class="name">
                                    {{ item.name }}
                                </div>
                            </div>
                            <p class="message">{{ item.message }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button">
                <button class="back btn_s btn_left" @click="toggleExpend">
                    <span>back</span>
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                </button>
                <button class="upload btn_s">上傳烹煮心得</button>
            </div>
        </section>
    </div>
</template>

<script>
import productList from "@/assets/data/productList.js";
import productShare from "@/assets/data/productShare.js";
export default {
    data() {
        return {
            newProduct: productList[0],
            productList,
            productShare,
            isExpendVisible: false,
        };
    },
    methods: {
        update(index) {
            this.newProduct = { ...this.filteredProductList[index] };
        },
        toggleExpend() {
            this.isExpendVisible = !this.isExpendVisible;
        },
        hotExpend() {
            this.isExpendVisibleHot = !this.isExpendVisibleHot;
        },
    },
    computed: {
        filteredProductList() {
            return this.productList.filter(
                (item) => item.id >= 2 && item.id <= 6
            );
        },
        //待修改
        filteredProductShare() {
            if (window.innerWidth < 767) {
                return this.productShare.filter(
                    (item) => item.id >= 1 && item.id <= 2
                );
            } else if (window.innerWidth >= 768) {
                return this.productShare.filter(
                    (item) => item.id >= 1 && item.id <= 4
                );
            } else {
                return [];
            }
        },
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/product.scss";
</style>
