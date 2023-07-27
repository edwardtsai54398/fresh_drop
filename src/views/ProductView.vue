<template>
    <div class="container product_container">
        <div class="main_wrap">
            <!-- 產品介紹 -->
            <section class="main">
                <div class="main_title">
                    <button class="btn_s btn_left" @click="goBack">
                        <span>back</span>
                        <font-awesome-icon icon="fa-solid fa-arrow-left" />
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
                                    <p class="title_step">{{ step.title }}</p>
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
            <!-- 熱門推薦(screen > 768) -->
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
                            <h2 class="hot_name">{{ item.name }}</h2>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- 熱門推薦輪播圖(screen <= 768) -->
            <aside class="recommend_carousel">
                <div class="hot_ranking">
                    <div class="hot_title">
                        <img
                            src="../assets/images/product/crown.svg"
                            alt="recommend pic"
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
                            :key="item.id"
                            @click="update(index)"
                        >
                            <div class="pic">
                                <img :src="item.img" alt="" />
                            </div>
                            <div class="hot_info">
                                <div class="hot_type">{{ item.category }}</div>
                                <h2 class="hot_name">{{ item.name }}</h2>
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
                    v-for="(item, index) in filteredProductShare"
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
                                :src="item.img[0]"
                                alt="share_food"
                                @click="hideReport"
                            />
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
                        <button class="cross" @click="currentProductIndex = -1">
                            <font-awesome-icon icon="fa-solid fa-xmark" />
                        </button>
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
                <button class="cross" @click="uploadExpend">
                    <font-awesome-icon icon="fa-solid fa-xmark" />
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
                                :src="item.img[0]"
                                alt="share_food"
                                @click="hideReport"
                            />
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
                        <button class="cross" @click="currentProductIndex = -1">
                            <font-awesome-icon icon="fa-solid fa-xmark" />
                        </button>
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
    },
    data() {
        return {
            newProduct: productList[0],
            productList,
            productShare,
            isExpendVisible: false,
            isExpendUpload: false,
            currentProductIndex: -1,
            currentIndexForBtn: -1,
            isInputReport: false,
            // isExpendReport: false,
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
            this.$refs.fileInput.click(); // 触发文件输入框的点击事件
        },
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.previewImage = e.target.result; // 将图片 base64 编码设置为预览图片
                };
                reader.readAsDataURL(file);
            } else {
                this.previewImage = null;
            }
        },
        // -------
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
        currentProduct() {
            return (
                this.productShare.find(
                    (item, idx) => idx === this.currentProductIndex
                ) ?? {}
            );
        },
        isOpenPopup() {
            return this.currentProductIndex !== -1;
        },
    },
    watch: {
        currentProductIndex(nVal) {
            if (nVal === -1) this.currentIndexForBtn = -1;
        },
    },
});
</script>

<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/product.scss";
</style>
