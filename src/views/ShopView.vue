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
        <!-- 菜色分類 -->
        <aside class="selectmain">
            <div class="select_bar">
                <button class="item" @click="scrollToSection('main')">
                    主菜
                </button>
                <button class="item" @click="scrollToSection('soup')">
                    湯品
                </button>
                <button class="item" @click="scrollToSection('salad')">
                    沙拉
                </button>
            </div>
            <!-- 不包含的食材 -->
            <div class="select_adjust">
                <button class="btn_s adjust" @click="adjustExpend">
                    <font-awesome-icon icon="fa-solid fa-sliders" />
                </button>
                <!-- 不包含的食材遮罩 -->
                <div
                    class="mask"
                    v-show="isAdjustExpend"
                    @click="adjustExpend"
                ></div>
                <!-- 不包含的食材內容 -->
                <div class="hatefood" v-show="isAdjustExpend">
                    <p class="title">不包含的食材</p>
                    <div class="cant">
                        <div
                            class="allergy"
                            v-for="allergy in uniqueAllergy"
                            :key="allergy"
                        >
                            {{ allergy }}
                        </div>
                    </div>
                    <p class="text">
                        如果您有不食用上述以外的食材，請<a
                            href="#"
                            class="connect"
                            >聯繫我們</a
                        >，謝謝。
                    </p>
                    <div class="adjust_btn">
                        <button class="cross btn_s" @click="adjustExpend">
                            <font-awesome-icon icon="fa-solid fa-xmark" />
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
            <!-- 主菜 -->
            <section class="container" ref="main">
                <h4 class="menu_title" v-show="mainDishFilter.length > 0">
                    主菜 MAIN DISH
                </h4>
                <router-link to="/product/">
                    <div class="wrap_main_dish row">
                        <div
                            class="card col-6 col-md-4"
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
                </router-link>
            </section>
            <!-- 湯品 -->
            <section class="container" ref="soup">
                <h4 class="menu_title" v-show="soupFilter.length > 0">
                    湯品 SOUP
                </h4>
                <div class="wrap_main_dish row">
                    <div
                        class="card col-6 col-md-4"
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
            <!-- 沙拉 -->
            <section class="container" ref="salad">
                <h4 class="menu_title" v-show="saladFilter.length > 0">
                    沙拉 SALAD
                </h4>
                <div class="wrap_main_dish row">
                    <div
                        class="card col-6 col-md-4"
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
        </section>
        <!-- 清單、結帳按鈕 -->
        <aside class="choosewrap">
            <!-- 訂購步驟遮罩 -->
            <div class="mask" v-show="isStepExpend" @click="stepExpend"></div>
            <!-- 訂購步驟 -->
            <div class="step_wrap" v-show="isStepExpend || isDesktop">
                <!-- 步驟一 -->
                <div class="step one">
                    <div class="title">
                        <p>
                            <font-awesome-icon
                                :style="{
                                    color: '#1F8D61',
                                }"
                                icon="fa-solid fa-box-archive"
                            />
                        </p>
                        <p><span>step.1</span>選擇方案</p>
                        <p @click="stepOneExpend">
                            <font-awesome-icon
                                :style="{
                                    color: '#1F8D61',
                                }"
                                icon="fa-solid fa-plus"
                            />
                        </p>
                    </div>
                    <!-- 過渡動畫 -->
                    <transition name="expand">
                        <!-- 步驟一內容 -->
                        <div class="content_one" v-show="isStepOneExpend">
                            <div class="wrap">
                                <div><p>1.選擇購買方案</p></div>
                                <div class="choose">
                                    <div
                                        class="option_plan"
                                        v-for="option in optionsPlan"
                                        :key="option.value"
                                        @click="
                                            selectedOptionPlan = option.value
                                        "
                                        :class="{
                                            selected:
                                                selectedOptionPlan ===
                                                option.value,
                                            radio_plan: true,
                                        }"
                                    >
                                        {{ option.label }}
                                    </div>
                                    <div
                                        class="single"
                                        v-show="
                                            selectedOptionPlan === '單次購買'
                                        "
                                    >
                                        <p>請前往下一步選擇餐點</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap">
                                <div><p>2.每周幾份餐點</p></div>
                                <div class="choose">
                                    <div
                                        class="option_meal"
                                        v-for="option in optionsMeal"
                                        :key="option.value"
                                        @click="
                                            selectedOptionMeal = option.value
                                        "
                                        :class="{
                                            selected:
                                                selectedOptionMeal ===
                                                option.value,
                                            radio_plan: true,
                                        }"
                                    >
                                        {{ option.label }}
                                    </div>
                                </div>
                            </div>
                            <div class="wrap">
                                <div><p>3.連續寄送幾周</p></div>
                                <div class="choose">
                                    <div
                                        class="option_week"
                                        v-for="option in optionsWeek"
                                        :key="option.value"
                                        @click="
                                            selectedOptionWeek = option.value
                                        "
                                        :class="{
                                            selected:
                                                selectedOptionWeek ===
                                                option.value,
                                            radio_plan: true,
                                        }"
                                    >
                                        {{ option.label }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
                <!-- 步驟二 -->
                <div class="step two">
                    <div class="title">
                        <p>
                            <font-awesome-icon
                                :style="{
                                    color: '#1F8D61',
                                }"
                                icon="fa-solid fa-bowl-food"
                            />
                        </p>
                        <p><span>step.2</span>選擇餐點</p>
                        <p @click="stepTwoExpend">
                            <font-awesome-icon
                                :style="{
                                    color: '#1F8D61',
                                }"
                                icon="fa-solid fa-plus"
                            />
                        </p>
                    </div>
                    <!-- 過渡動畫 -->
                    <transition name="expand">
                        <!-- 步驟二內容 -->
                        <div class="content_two" v-show="isStepTwoExpend">
                            <!-- 總數、全部刪除按鈕 -->
                            <div class="topbtn">
                                <!-- 總數量要修改 -->
                                <div class="total_count">
                                    {{ count }}4/{{ count }}4<span>份</span>
                                </div>
                                <div class="btn_s delete">全部刪除</div>
                            </div>
                            <!-- 頁籤 -->
                            <div class="week_tap">
                                <div
                                    class="week"
                                    v-for="(item, key) in tabWeek"
                                    :key="key"
                                    :class="{ active: key == tabActive }"
                                    @click="updateTab(key)"
                                >
                                    {{ item }}
                                </div>
                            </div>
                            <!-- 餐點 week1 -->
                            <div class="dishes" v-if="tabActive == 1">
                                <div
                                    class="circle"
                                    v-for="(item, index) in productList"
                                    :key="index"
                                >
                                    <div class="dishes_pic">
                                        <img :src="item.img" />
                                    </div>
                                    <div class="dishes_content">
                                        <div class="category_and_cancel">
                                            <div class="category">
                                                {{ item.category }}
                                            </div>
                                            <button
                                                class="cancel"
                                                @click="removeCart(index)"
                                            >
                                                <font-awesome-icon
                                                    icon="fa-solid fa-trash-can"
                                                />
                                            </button>
                                        </div>
                                        <div class="dishes_title">
                                            <h2>{{ item.name }}</h2>
                                        </div>
                                        <div class="count">
                                            <button
                                                class="reduce"
                                                @click="reduceCart(index)"
                                            >
                                                <font-awesome-icon
                                                    :style="{
                                                        color: '#ffffff',
                                                    }"
                                                    icon="fa-solid fa-minus"
                                                />
                                            </button>
                                            <input
                                                type="number"
                                                class="common"
                                                v-model="item.count"
                                            />
                                            <button
                                                class="increase"
                                                @click="addCart(index)"
                                            >
                                                <font-awesome-icon
                                                    :style="{
                                                        color: '#ffffff',
                                                    }"
                                                    icon="fa-solid fa-plus"
                                                />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 餐點 week2 -->
                            <div class="dishes" v-if="tabActive == 2">
                                <div
                                    class="circle"
                                    v-for="(item, index) in productList"
                                    :key="index"
                                >
                                    <div class="dishes_pic">
                                        <img :src="item.img" />
                                    </div>
                                    <div class="dishes_content">
                                        <div class="category_and_cancel">
                                            <div class="category">
                                                {{ item.category }}
                                            </div>
                                            <button
                                                class="cancel"
                                                @click="removeCart(index)"
                                            >
                                                <font-awesome-icon
                                                    icon="fa-solid fa-trash-can"
                                                />
                                            </button>
                                        </div>
                                        <div class="dishes_title">
                                            <h2>{{ item.name }}</h2>
                                        </div>
                                        <div class="count">
                                            <button
                                                class="reduce"
                                                @click="reduceCart(index)"
                                            >
                                                <font-awesome-icon
                                                    :style="{
                                                        color: '#ffffff',
                                                    }"
                                                    icon="fa-solid fa-minus"
                                                />
                                            </button>
                                            <input
                                                type="number"
                                                class="common"
                                                v-model="item.count"
                                            />
                                            <button
                                                class="increase"
                                                @click="addCart(index)"
                                            >
                                                <font-awesome-icon
                                                    :style="{
                                                        color: '#ffffff',
                                                    }"
                                                    icon="fa-solid fa-plus"
                                                />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 餐點 week3 -->
                            <div class="dishes" v-if="tabActive == 3">
                                <div
                                    class="circle"
                                    v-for="(item, index) in productList"
                                    :key="index"
                                >
                                    <div class="dishes_pic">
                                        <img :src="item.img" />
                                    </div>
                                    <div class="dishes_content">
                                        <div class="category_and_cancel">
                                            <div class="category">
                                                {{ item.category }}
                                            </div>
                                            <button
                                                class="cancel"
                                                @click="removeCart(index)"
                                            >
                                                <font-awesome-icon
                                                    icon="fa-solid fa-trash-can"
                                                />
                                            </button>
                                        </div>
                                        <div class="dishes_title">
                                            <h2>{{ item.name }}</h2>
                                        </div>
                                        <div class="count">
                                            <button
                                                class="reduce"
                                                @click="reduceCart(index)"
                                            >
                                                <font-awesome-icon
                                                    :style="{
                                                        color: '#ffffff',
                                                    }"
                                                    icon="fa-solid fa-minus"
                                                />
                                            </button>
                                            <input
                                                type="number"
                                                class="common"
                                                v-model="item.count"
                                            />
                                            <button
                                                class="increase"
                                                @click="addCart(index)"
                                            >
                                                <font-awesome-icon
                                                    :style="{
                                                        color: '#ffffff',
                                                    }"
                                                    icon="fa-solid fa-plus"
                                                />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 餐點 week4 -->
                            <div class="dishes" v-if="tabActive == 4">
                                <div
                                    class="circle"
                                    v-for="(item, index) in productList"
                                    :key="index"
                                >
                                    <div class="dishes_pic">
                                        <img :src="item.img" />
                                    </div>
                                    <div class="dishes_content">
                                        <div class="category_and_cancel">
                                            <div class="category">
                                                {{ item.category }}
                                            </div>
                                            <button
                                                class="cancel"
                                                @click="removeCart(index)"
                                            >
                                                <font-awesome-icon
                                                    icon="fa-solid fa-trash-can"
                                                />
                                            </button>
                                        </div>
                                        <div class="dishes_title">
                                            <h2>{{ item.name }}</h2>
                                        </div>
                                        <div class="count">
                                            <button
                                                class="reduce"
                                                @click="reduceCart(index)"
                                            >
                                                <font-awesome-icon
                                                    :style="{
                                                        color: '#ffffff',
                                                    }"
                                                    icon="fa-solid fa-minus"
                                                />
                                            </button>
                                            <input
                                                type="number"
                                                class="common"
                                                v-model="item.count"
                                            />
                                            <button
                                                class="increase"
                                                @click="addCart(index)"
                                            >
                                                <font-awesome-icon
                                                    :style="{
                                                        color: '#ffffff',
                                                    }"
                                                    icon="fa-solid fa-plus"
                                                />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
            <!-- 按鈕 -->
            <div class="shop_btn">
                <button
                    class="list_btn btn_s"
                    @click="stepExpend"
                    :disabled="isDesktop"
                >
                    <font-awesome-icon icon="fa-solid fa-box-open" />
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
            uniqueAllergy: [],
            isAdjustExpend: false,
            isStepExpend: false,
            isDesktop: false,
            isStepOneExpend: false,
            isStepTwoExpend: false,
            isActive: false,
            optionsPlan: [
                { value: "單次購買", label: "單次購買" },
                { value: "定期配送", label: "定期配送" },
            ],
            selectedOptionPlan: "", // 儲存選中的選項
            optionsMeal: [
                { value: "4份", label: "4份" },
                { value: "6份", label: "6份" },
                { value: "10份", label: "10份" },
            ],
            selectedOptionMeal: "", // 儲存選中的選項
            optionsWeek: [
                { value: "2周", label: "2周" },
                { value: "3周", label: "3周" },
                { value: "4周", label: "4周" },
            ],
            selectedOptionWeek: "", // 儲存選中的選項

            // 點擊移動至對應區塊(定義滾動目標區塊的 `ref` 名稱)
            sectionRefs: {
                main: null,
                soup: null,
                salad: null,
            },
            tabActive: 1,
            tabWeek: {
                1: "WEEK1",
                2: "WEEK2",
                3: "WEEK3",
                4: "WEEK4",
            },
        };
    },
    computed: {
        //篩選菜色類別
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
    created() {
        // 不包含的食材
        this.collectUniqueNames();
    },
    methods: {
        // 搜尋菜單
        searchFilter(text) {
            let result = this.productList.filter((item) => {
                return item.name.includes(text);
            });
            this.searchList = result;
        },
        // 點擊移動至對應區塊
        scrollToSection(sectionName) {
            const section = this.$refs[sectionName];
            if (section) {
                // 計算目標區塊的頂部位置
                const topOffset = section.getBoundingClientRect().top;
                // 向上滑動 100px
                const offset = -90;
                const scrollToPosition = topOffset + offset;
                window.scrollTo({
                    top: scrollToPosition,
                    behavior: "smooth",
                });
            }
        },
        // 不包含的食材
        collectUniqueNames() {
            const uniqueAllergySet = new Set();
            this.productList.forEach((item) => {
                item.allergy.forEach((allergy) => {
                    uniqueAllergySet.add(allergy);
                });
            });
            this.uniqueAllergy = Array.from(uniqueAllergySet);
        },
        // 不包含的食材彈窗
        adjustExpend() {
            this.isAdjustExpend = !this.isAdjustExpend;
        },
        // 訂購步驟彈窗
        stepExpend() {
            this.isStepExpend = !this.isStepExpend;
        },
        // 步驟一彈窗
        stepOneExpend() {
            this.isStepOneExpend = !this.isStepOneExpend;
        },
        //點擊單次購買展開的內容
        selectOptionPlan(value) {
            this.selectedOptionPlan = value;
        },
        // 步驟二彈窗
        stepTwoExpend() {
            this.isStepTwoExpend = !this.isStepTwoExpend;
        },
        //------------ 購物車------------
        // 禁止購物車數量<0
        reduceCart(index) {
            if (this.productList[index]["count"] == 0) return;
            this.productList[index]["count"] -= 1;
        },
        // 禁止購物車數量>商品庫存數量(待修改)
        addCart(index) {
            if (
                this.productList[index]["count"] ===
                this.productList[index]["stock"]
            )
                return;
            this.productList[index]["count"] += 1;
        },
        // 取消商品
        removeCart(index) {
            this.productList.splice(index, 1);
        },
        // 螢幕寬度大於768自動顯示
        handleResize() {
            this.isDesktop = window.innerWidth >= 768;
        },
        // tap:week點擊後保持樣式(修改)
        updateTab(index) {
            if (this.tabActive === index) {
                this.tabActive = null;
            } else {
                this.tabActive = index;
            }
        },
    },
    mounted() {
        this.isDesktop = window.innerWidth >= 768;
        window.addEventListener("resize", this.handleResize);
    },
    beforeUnmount() {
        window.removeEventListener("resize", this.handleResize);
    },
};
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/shop.scss";
</style>
