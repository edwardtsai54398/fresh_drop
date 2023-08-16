<template>
    <div class="container product_container">
        <div class="main_wrap">
            <!-- 產品介紹 -->
            <section class="main">
                <div class="main_title">
                    <button class="btn_s btn_left" @click="goBack">
                        <span>Back</span>
                        <font-awesome-icon icon="fa-solid fa-arrow-left" />
                    </button>
                    <div class="title">
                        <div class="type">
                            <span v-if="newProduct.class == 0">主菜</span>
                            <span v-if="newProduct.class == 1">湯品</span>
                            <span v-if="newProduct.class == 2">沙拉</span>
                        </div>
                        <h2>{{ newProduct.recipe_name }}</h2>
                    </div>
                </div>
                <div class="info_pic">
                    <div class="pic">
                        <!-- 開發用 -->
                        <img
                            :src="`/data_images/product/${newProduct.recipe_pic}`"
                            alt=""
                        />
                        <!-- 上線用 -->
                        <!-- <img :src="`/chd102/g2/data_images/product/${newProduct.recipe_pic}`" alt="" /> -->
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
                                v-for="(item, index) in newProduct.ingreds"
                                :key="index"
                            >
                                {{ item.ingred_name }}，{{ item.quantity_unit }}
                            </p>
                        </div>
                    </div>

                    <div>
                        <p>步驟</p>
                        <ol
                            class="wrap"
                            ref=""
                            v-for="(item, index) in newProductStep"
                            :key="index"
                        >
                            <li class="li_wrap">
                                <span class="number">{{ index + 1 }}</span>
                                <div class="title_border">
                                    <p class="title_step">
                                        {{ item.title }}
                                    </p>
                                </div>
                                <ul class="ul_wrap">
                                    <li
                                        v-for="(subitem, subIndex) in item.desc"
                                        :key="subIndex"
                                    >
                                        <p class="info">{{ subitem }}</p>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                    <div>
                        <p>過敏原</p>
                        <div class="wrap allergy_wrap">
                            <p
                                class="allergy"
                                v-for="(item, index) in newProduct.allergys"
                                :key="index"
                            >
                                {{ item }}
                            </p>
                        </div>
                    </div>
                </article>
            </section>
            <!-- 熱門推薦(screen > 768) -->
            <aside class="recommend">
                <div class="hot_ranking" :class="{ 'scroll-up': isScrollUp }">
                    <div class="hot_title">
                        <img
                            :src="require(`../assets/images/product/crown.svg`)"
                            alt=""
                        />
                        熱門推薦
                    </div>
                    <div
                        class="hot_product"
                        v-for="(item, index) in filteredProductList"
                        :key="item.recipe_no"
                        @click="update(index)"
                    >
                        <div class="pic">
                            <!-- 開發用 -->
                            <img
                                :src="`/data_images/product/${item.recipe_pic}`"
                                alt=""
                            />
                            <!-- 上線用 -->
                            <!-- <img :src="`/chd102/g2/data_images/product/${item.recipe_pic}`" alt="" /> -->
                        </div>
                        <div class="hot_info">
                            <div class="hot_type">
                                <span v-if="item.class == 0">主菜</span>
                                <span v-if="item.class == 1">湯品</span>
                                <span v-if="item.class == 2">沙拉</span>
                            </div>
                            <h2 class="hot_name">{{ item.recipe_name }}</h2>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- 熱門推薦輪播圖(screen <= 768) -->
            <aside class="recommend_carousel">
                <div class="hot_ranking">
                    <div class="hot_title">
                        <img
                            :src="require(`../assets/images/product/crown.svg`)"
                            alt=""
                        />
                        熱門推薦
                    </div>
                    <carousel
                        v-bind="settings"
                        :breakpoints="breakpoints"
                        :wrap-around="true"
                    >
                        <slide
                            v-for="(item, index) in filteredProductList"
                            :key="item.recipe_no"
                            @click="update(index)"
                        >
                            <div class="pic">
                                <!-- 開發用 -->
                                <img
                                    :src="`/data_images/product/${item.recipe_pic}`"
                                    alt=""
                                />
                                <!-- 上線用 -->
                                <!-- <img :src="`/chd102/g2/data_images/product/${item.recipe_pic}`" alt="" /> -->
                            </div>
                            <div class="hot_info">
                                <div class="hot_type">
                                    <span v-if="item.class == 0">主菜</span>
                                    <span v-if="item.class == 1">湯品</span>
                                    <span v-if="item.class == 2">沙拉</span>
                                </div>
                                <h2 class="hot_name">{{ item.recipe_name }}</h2>
                            </div>
                        </slide>
                        <template #addons>
                            <!-- <navigation />左右按鈕元件，可拿掉 -->
                            <pagination /><!--頁籤元件，可拿掉-->
                        </template>
                    </carousel>
                </div>
            </aside>
        </div>
        <!-- 心得分享 -->
        <section class="share">
            <div class="text">
                <p class="title">一起做</p>
                <button class="more" @click="toggleExpend">看更多</button>
            </div>
            <div class="cook row">
                <div
                    class="wrap col-6 col-md-3"
                    v-for="(item, index) in showMaxFour"
                    :key="index"
                >
                    <div class="card">
                        <div class="pic pic_food">
                            <div class="dot_wrap">
                                <!-- 更多按鈕 -->
                                <div class="dot" @click="showReport(index)">
                                    <font-awesome-icon
                                        icon="fa-solid fa-ellipsis-vertical"
                                    />
                                </div>
                                <!-- 檢舉按鈕 -->
                                <div class="report">
                                    <p
                                        class="text"
                                        v-show="currentIndexForBtn === index"
                                        @click="currentProductIndex = index"
                                    >
                                        檢舉
                                    </p>
                                </div>
                            </div>
                            <img
                                :src="
                                    require(`@/assets/images/product/${item.opinion_no_pic}`)
                                "
                                alt="share_food"
                                @click="hideReport"
                            />
                        </div>
                        <div class="user">
                            <div class="wrap">
                                <div class="pic pic_people">
                                    <img
                                        src="./@/../../../../fresh_drop/src/assets/images/logo/robo.png"
                                        alt=""
                                    />
                                </div>
                                <div class="name">
                                    <p>匿名</p>
                                </div>
                            </div>
                            <p class="message">{{ item.experience }}</p>
                        </div>
                    </div>
                </div>
                <!-- 檢舉遮罩 -->
                <div
                    class="mask mask_report"
                    v-show="isOpenPopup"
                    @click="currentProductIndex = -1"
                ></div>
                <!-- 檢舉彈窗 -->
                <div class="content_report" v-show="isOpenPopup">
                    <div class="content_wrap">
                        <p class="title">檢舉原因</p>
                        <modalClose
                            class="cross"
                            @click="currentProductIndex = -1"
                        />
                        <div class="input">
                            <textarea
                                v-model="text"
                                placeholder="請輸入檢舉原因"
                                class="report_text"
                            ></textarea>
                        </div>
                        <button class="btn_s report_btn">確認送出</button>
                    </div>
                </div>
            </div>
            <button class="upload_out btn_m" @click="uploadExpend">
                上傳烹煮心得
            </button>
        </section>
        <!-- 上傳心得分享彈窗遮罩 -->
        <div
            class="mask mask_upload"
            v-show="isExpendUpload"
            @click="uploadExpend"
        ></div>
        <!-- 上傳心得分享彈窗 -->
        <div class="upload_window" v-show="isExpendUpload">
            <div class="title_window">
                <p class="text_title">心得分享</p>
                <modalClose class="cross" @click="uploadExpend" />
            </div>
            <div class="title">
                <div class="type">
                    <span v-if="newProduct.class == 0">主菜</span>
                    <span v-if="newProduct.class == 1">湯品</span>
                    <span v-if="newProduct.class == 2">沙拉</span>
                </div>
                <h2>{{ newProduct.recipe_name }}</h2>
            </div>
            <div class="upload_wrap">
                <div>
                    <div class="upload_file">
                        <button class="file_btn" @click="triggerFileInput">
                            <p class="file_text">點擊上傳照片</p>
                        </button>
                        <input
                            id="fileInput"
                            type="file"
                            ref="fileInput"
                            @change="handleFileUpload"
                            style="display: none"
                        />
                        <div class="upload_pic" v-if="previewImage">
                            <img
                                class="pic"
                                :src="previewImage"
                                alt="Preview"
                            />
                        </div>
                    </div>
                    <div class="text_wrap">
                        <textarea
                            v-model="text"
                            placeholder="說說你的烹飪心得吧！"
                            class="upload_text"
                        ></textarea>
                    </div>
                </div>
                <button @click="uploadText" class="upload_btn btn_s">
                    發布心得
                </button>
            </div>
        </div>
        <!-- 看更多彈窗遮罩 -->
        <div class="mask" v-show="isExpendVisible" @click="toggleExpend"></div>
        <!-- 看更多心得分享彈窗+回到頂部 -->
        <section class="more_expend" v-show="isExpendVisible" ref="moreRef">
            <div class="title">
                <div class="type">
                    <span v-if="newProduct.class == 0">主菜</span>
                    <span v-if="newProduct.class == 1">湯品</span>
                    <span v-if="newProduct.class == 2">沙拉</span>
                </div>
                <h2>{{ newProduct.recipe_name }}</h2>
                <span>一起做</span>
            </div>
            <div class="content">
                <div class="row">
                    <div
                        class="card col-6 col-md-3"
                        v-for="(item, index) in opinionData"
                        :key="index"
                    >
                        <div class="pic pic_food">
                            <div class="dot_wrap">
                                <!-- 更多按鈕 -->
                                <div class="dot" @click="showReport(index)">
                                    <font-awesome-icon
                                        icon="fa-solid fa-ellipsis-vertical"
                                    />
                                </div>
                                <!-- 檢舉按鈕 -->
                                <div class="report">
                                    <p
                                        class="text"
                                        v-show="currentIndexForBtn === index"
                                        @click="currentProductIndex = index"
                                    >
                                        檢舉
                                    </p>
                                </div>
                            </div>
                            <img
                                :src="
                                    require(`@/assets/images/product/${item.opinion_no_pic}`)
                                "
                                alt="share_food"
                                @click="hideReport"
                            />
                        </div>
                        <div class="user">
                            <div class="wrap">
                                <div class="pic pic_people">
                                    <img
                                        src="./@/../../../../fresh_drop/src/assets/images/logo/robo.png"
                                        alt=""
                                    />
                                </div>
                                <div class="name">
                                    <p>匿名</p>
                                </div>
                            </div>
                            <p class="message">{{ item.experience }}</p>
                        </div>
                    </div>
                </div>
                <!-- 檢舉遮罩 -->
                <div
                    class="mask mask_report"
                    v-show="isOpenPopup"
                    @click="currentProductIndex = -1"
                ></div>
                <!-- 檢舉彈窗 -->
                <div class="content_report" v-show="isOpenPopup">
                    <div class="content_wrap">
                        <p class="title">檢舉原因</p>
                        <modalClose
                            class="cross"
                            @click="currentProductIndex = -1"
                        />
                        <div class="input">
                            <textarea
                                v-model="text"
                                placeholder="請輸入檢舉原因"
                                class="report_text"
                            ></textarea>
                        </div>
                        <button class="btn_s report_btn">確認送出</button>
                    </div>
                </div>
            </div>
            <div class="button">
                <button class="back btn_s btn_left" @click="toggleExpend">
                    <span>back</span>
                    <font-awesome-icon icon="fa-solid fa-arrow-left" />
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
import modalClose from "@/components/modalClose.vue";
//引入輪播圖套件
import { defineComponent } from "vue";
import { Carousel, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";

let resizeEvent = null;
export default defineComponent({
    //輪播圖設定
    name: "ProductView",
    components: {
        Carousel,
        Slide,
        // Navigation,
        modalClose,
    },
    data() {
        return {
            newProduct: productList[0],
            recipeData: [],
            opinionData: [],
            productList,
            productShare,
            isExpendVisible: false,
            isExpendUpload: false,
            currentProductIndex: -1,
            currentIndexForBtn: -1,
            isInputReport: false,
            mobile: false,
            aaa: false,
            //輪播圖設定
            settings: {
                itemsToShow: 2,
                snapAlign: "center",
            },
            breakpoints: {
                700: {
                    itemsToShow: 2,
                    snapAlign: "center",
                },
            },
            text: "",
            //上傳圖片
            previewImage: null,

            //hot_ranking scroll-up
            isScrollUp: true,
            prevScrollY: 0,
            isToggleOpen: false,
        };
    },
    created() {
        this.newProduct = this.$store.state.productDetil;
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
        // 心得分享斷點
        setWidth(width) {
            // console.log(width)// 換頁就可以知道unmounted有沒有效
            this.mobile = width <= 768;
        },
        // 檢舉按鈕
        expendReport() {
            this.isExpendReport = !this.isExpendReport;
        },
        showReport(index) {
            this.isExpendReport = true;
            this.aaa = true;
            this.currentIndexForBtn = index;
        },
        hideReport() {
            this.currentProductIndex = -1;
            this.isExpendReport = false;
            this.currentIndexForBtn = -1;
        },
        // 檢舉原因輸入
        inputReport() {
            this.isInputReport = !this.isInputReport;
            this.isExpendReport = false;
            this.aaa = false;
        },
        goBack() {
            window.history.back();
        },
        //上傳圖片
        triggerFileInput() {
            this.$refs.fileInput.click();
        },
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.previewImage = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                this.previewImage = null;
            }
        },
        // -------
        hotRankingInOut() {
            let scrollY = window.scrollY;
            let winW = window.innerWidth;
            if (winW >= 1200 && scrollY > 100) {
                if (scrollY > this.prevScrollY) {
                    this.isScrollUp = false;
                } else if (scrollY < this.prevScrollY) {
                    this.isScrollUp = true;
                }
            } else {
                this.isScrollUp = true;
            }
            this.prevScrollY = scrollY;
        },
        //串接recipe資料庫
        getRecipeData() {
            let url = `${this.$url}recipeRows.php`;
            this.axios
                .get(url)
                .then((res) => {
                    console.log(res.data);
                    this.recipeData = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        //串接opinion資料庫
        getopinionData() {
            let url = `${this.$url}opinion.php`;
            this.axios
                .get(url)
                .then((res) => {
                    console.log(res.data);
                    this.opinionData = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    computed: {
        filteredProductList() {
            return this.recipeData.filter(
                (item) => item.recipe_no >= 2 && item.recipe_no <= 6
            );
        },
        // filteredProductShare() {
        //     if (this.mobile) {
        //         return this.opinionData.filter(
        //             (item) => item.id >= 1 && item.id <= 2
        //         );
        //     } else {
        //         return this.opinionData.filter(
        //             (item) => item.id >= 1 && item.id <= 4
        //         );
        //     }
        // },
        showMaxFour() {
            return this.opinionData.slice(0, 4);
        },
        currentProduct() {
            return (
                this.opinionData.find(
                    (item, idx) => idx === this.currentProductIndex
                ) ?? {}
            );
        },
        isOpenPopup() {
            return this.currentProductIndex !== -1;
        },
        // 製作步驟資料整理
        newProductStep() {
            let originalStep = this.newProduct?.step ?? [];
            let result = [];
            for (let i = 0, j = 0; i < originalStep.length; i += 2, j++) {
                result[j] = {};
                result[j].title = originalStep[i][0];
                result[j].desc = originalStep[i + 1];
            }
            return result;
        },
    },
    watch: {
        currentProductIndex(nVal) {
            if (nVal === -1) this.currentIndexForBtn = -1;
        },
    },
    mounted() {
        //串接recipe資料庫
        this.getRecipeData();
        this.getopinionData();

        this.isDesktop = window.innerWidth >= 768;
        window.addEventListener("scroll", this.hotRankingInOut);
    },
    beforeUnmount() {
        window.removeEventListener("scroll", this.hotRankingInOut);
    },
});
</script>

<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/product.scss";
</style>
