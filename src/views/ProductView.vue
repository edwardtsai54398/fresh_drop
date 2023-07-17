<template>
    <div class="container product_container">
        <div class="main_wrap">
            <!-- 產品介紹 -->
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
            <!-- 熱門推薦 -->
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
        <!-- 心得分享 -->
        <section class="share">
            <!-- mobile: {{ mobile }} 測試用-->
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
            <button class="upload_out btn_l" @click="uploadExpend">
                上傳烹煮心得
            </button>
        </section>
        <!-- 上傳心得分享彈窗遮罩 -->
        <div class="mask_upload" v-show="isExpendUpload"></div>
        <!-- 上傳心得分享彈窗 -->
        <div class="upload_window" v-show="isExpendUpload">
            <div class="title_window">
                <p class="text_title">心得分享</p>
                <button class="cross" @click="uploadExpend">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="title">
                <div class="type">
                    <span>{{ newProduct.category }}</span>
                </div>
                <h2>{{ newProduct.name }}</h2>
            </div>
            <div class="upload_wrap">
                <div>
                    <div class="upload_file">
                        <input type="file" @change="handleFileUpload" />
                        <button @click="uploadFile">
                            <!-- <span><i class="fa-regular fa-image"></i></span>
                                <span>點擊上傳照片</span> -->
                        </button>
                    </div>
                    <div class="text_wrap">
                        <textarea
                            v-model="text"
                            placeholder="說說你的烹飪心得吧！"
                            class="upload_text"
                        ></textarea>
                    </div>
                </div>
                <button @click="uploadText" class="upload_btn btn_m">
                    發布心得
                </button>
            </div>
        </div>
        <!-- 看更多彈窗遮罩 -->
        <div class="mask_more" v-show="isExpendVisible"></div>
        <!-- 看更多心得分享彈窗(回到頂部) -->
        <section class="more_expend" v-show="isExpendVisible" ref="moreRef">
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
                <button class="upload btn_s" @click="uploadExpend">
                    上傳烹煮心得
                </button>
            </div>
        </section>
    </div>
</template>

<script>
import productList from "@/assets/data/productList.js";
import productShare from "@/assets/data/productShare.js";
let resizeEvent = null;
export default {
    data() {
        return {
            newProduct: productList[0],
            productList,
            productShare,
            isExpendVisible: false,
            isExpendUpload: false,
            mobile: false,
        };
    },
    created() {
        this.setWidth(window.innerWidth);
        resizeEvent = (e) => this.setWidth(e.target.innerWidth);
        window.addEventListener("resize", resizeEvent);
    },
    unmounted() {
        window.removeEventListener("resize", resizeEvent);
    },

    methods: {
        update(index) {
            this.newProduct = { ...this.filteredProductList[index] };
        },
        // 看更多心得分享彈窗
        toggleExpend() {
            // 展開/收合
            this.isExpendVisible = !this.isExpendVisible;
            // 回到頂部
            if (this.isExpendVisible) {
                this.$nextTick(() => {
                    this.$refs.moreRef.scrollTop = 0;
                });
            }
        },
        // 上傳心得分享彈窗
        uploadExpend() {
            this.isExpendUpload = !this.isExpendUpload;
        },
        setWidth(width) {
            // console.log(width)// 換頁就可以知道unmounted有沒有效
            this.mobile = width <= 768;
        },
    },
    computed: {
        filteredProductList() {
            return this.productList.filter(
                (item) => item.id >= 2 && item.id <= 6
            );
        },
        filteredProductShare() {
            if (this.mobile) {
                return this.productShare.filter(
                    (item) => item.id >= 1 && item.id <= 2
                );
            } else {
                return this.productShare.filter(
                    (item) => item.id >= 1 && item.id <= 4
                );
            }
        },
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/page/product.scss";
</style>
