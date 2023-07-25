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
                <div class="mask" v-show="isAdjustExpend" @click="adjustExpend"></div>
                <!-- 不包含的食材內容 -->
                <div class="hatefood" v-show="isAdjustExpend">
                    <p class="title">不包含的食材</p>
                    <div class="cant">
                        <div class="allergy" v-for="allergy in uniqueAllergy" :key="allergy">
                            {{ allergy }}
                        </div>
                    </div>
                    <p class="text">
                        如果您有不食用上述以外的食材，請<a href="#" class="connect">聯繫我們</a>，謝謝。
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
                <div class="wrap_main_dish row">
                    <div class="card col-6 col-md-4" v-for="(item, index) in mainDishFilter" :key="index">
                        <router-link to="/product" @click="sendProductDetail">
                            <div class="pic">
                                <img :src="item.img" />
                            </div>
                            <h3>{{ item.name }}</h3>
                        </router-link>
                        <div class="btn_scd_s" @click="addCart(index, mainDishFilter)">
                            選購
                        </div>
                    </div>
                </div>
            </section>
            <!-- 湯品 -->
            <section class="container" ref="soup">
                <h4 class="menu_title" v-show="soupFilter.length > 0">
                    湯品 SOUP
                </h4>
                <div class="wrap_main_dish row">
                    <div class="card col-6 col-md-4" v-for="(item, index) in soupFilter" :key="index">
                        <router-link to="/product" @click="sendProductDetail">
                            <div class="pic">
                                <img :src="item.img" />
                            </div>
                            <h3>{{ item.name }}</h3>
                        </router-link>
                        <div class="btn_scd_s" @click="addCart(index, soupFilter)">
                            選購
                        </div>
                    </div>
                </div>
            </section>
            <!-- 沙拉 -->
            <section class="container" ref="salad">
                <h4 class="menu_title" v-show="saladFilter.length > 0">
                    沙拉 SALAD
                </h4>
                <div class="wrap_main_dish row">
                    <div class="card col-6 col-md-4" v-for="(item, index) in saladFilter" :key="index">
                        <router-link to="/product" @click="sendProductDetail">
                            <div class="pic">
                                <img :src="item.img" />
                            </div>
                            <h3>{{ item.name }}</h3>
                        </router-link>
                        <div class="btn_scd_s" @click="addCart(index, saladFilter)">
                            選購
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!-- 清單、結帳按鈕 -->
        <aside class="choosewrap">
            <!-- 訂購步驟遮罩 -->
            <div class="mask" v-show="isStepExpend" @click="this.isStepExpend = !this.isStepExpend"></div>
            <!-- 訂購步驟 -->
            <div class="step_wrap" v-show="isStepExpend || isDesktop">
                <!-- 步驟一 -->
                <div class="step one">
                    <div class="title" @click="stepOneExpend">
                        <p>
                            <font-awesome-icon :style="{ color: '#1F8D61' }" icon="fa-solid fa-box-archive" />
                        </p>
                        <p><span>step.1</span>選擇方案</p>
                        <p>
                            <font-awesome-icon :style="{ color: '#1F8D61' }" icon="fa-solid fa-plus" />
                        </p>
                    </div>
                    <!-- 過渡動畫 -->
                    <transition name="expand">
                        <!-- 步驟一內容 -->
                        <div class="content_one" v-show="isStepOneExpend">
                            <div class="wrap">
                                <div>
                                    <p>1.選擇購買方案</p>
                                </div>
                                <div class="choose">
                                    <div class="option_plan" v-for="option in optionsPlan" :key="option.value" @click="
                                            selectedOptionPlan = option.value;
                                            isPlanSelectDone();
                                        " :class="{
                                            selected:
                                                selectedOptionPlan ===
                                                option.value,
                                            radio_plan: true,
                                        }">
                                        {{ option.label }}
                                    </div>
                                    <div class="single" v-show="
                                            selectedOptionPlan === '單次購買'
                                        ">
                                        <p>請前往下一步選擇餐點</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap" v-if="selectedOptionPlan == '定期配送'">
                                <div>
                                    <p>2.每周幾份餐點</p>
                                </div>
                                <div class="choose">
                                    <div class="option_meal" v-for="option in optionsMeal" :key="option" @click="
                                            selectedOptionMeal = option;
                                            isPlanSelectDone();
                                        " :class="{
                                            selected:
                                                selectedOptionMeal === option,
                                            radio_plan: true,
                                        }">
                                        {{ option }}份
                                    </div>
                                </div>
                            </div>
                            <div class="wrap" v-if="selectedOptionPlan == '定期配送'">
                                <div>
                                    <p>3.連續寄送幾周</p>
                                </div>
                                <div class="choose">
                                    <div class="option_week" v-for="option in optionsWeek" :key="option" @click="
                                            selectedOptionWeek = option;
                                            isPlanSelectDone();
                                        " :class="{
                                            selected:
                                                selectedOptionWeek === option,
                                            radio_plan: true,
                                        }">
                                        {{ option }}周
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
                            <font-awesome-icon :style="{
                                    color: '#1F8D61',
                                }" icon="fa-solid fa-bowl-food" />
                        </p>
                        <p><span>step.2</span>選擇餐點</p>
                        <p>
                            <font-awesome-icon :style="{
                                    color: '#1F8D61',
                                }" icon="fa-solid fa-plus" />
                        </p>
                    </div>
                    <!-- 過渡動畫 -->
                    <transition name="expand">
                        <!-- 步驟二內容 -->
                        <div class="content_two" v-show="isStepTwoExpend">
                            <!-- 總數、全部刪除按鈕 -->
                            <div class="topbtn">
                                <!-- 總數量要修改 -->
                                <div class="total_count" v-show="selectedOptionPlan == '定期配送'">
                                    {{ cartTotalAmount }}/{{ selectedOptionMeal
                                    }}<span>份</span>
                                </div>
                                <div class="total_count" v-show="selectedOptionPlan == '單次購買'">
                                    {{ cartTotalAmount }}<span>份</span>
                                </div>
                                <div class="btn_s delete" @click="cartList = [[]]">
                                    全部刪除
                                </div>
                            </div>
                            <!-- 頁籤 -->
                            <div class="week_tap" v-show="selectedOptionPlan === '定期配送'">
                                <div class="week" v-for="n in selectedOptionWeek" :key="n" :class="{ active: n == tabActive }" @click="updateTab(n)">
                                    WEEK{{ n }}
                                </div>
                            </div>

                            <div class="dishes" v-for="n in selectedOptionWeek" :key="n" v-show="tabActive == n">
                                <p class="no_item" v-show="cartList[tabActive - 1].length == 0">
                                    購物欄內目前沒有商品
                                </p>
                                <div class="circle" v-for="(item, index) in cartList[n - 1]" :key="index">

                                    <div class="dishes_pic">
                                        <img :src="item.img" />
                                    </div>
                                    <div class="dishes_content">
                                        <div class="category_and_cancel">
                                            <div class="category">
                                                {{ item.category }}
                                            </div>
                                            <button class="cancel" @click="removeCart(index)">
                                                <font-awesome-icon icon="fa-solid fa-trash-can" />
                                            </button>
                                        </div>
                                        <div class="dishes_title">
                                            <h2>{{ item.name }}</h2>
                                        </div>
                                        <div class="count">
                                            <button class="reduce" @click="amountReduce(index)">
                                                <font-awesome-icon :style="{
                                                        color: '#ffffff',
                                                    }" icon="fa-solid fa-minus" />
                                            </button>
                                            <input type="number" class="common" :value="item.amount" />
                                            <button class="increase" @click="amountIncrease(index)">
                                                <font-awesome-icon :style="{
                                                        color: '#ffffff',
                                                    }" icon="fa-solid fa-plus" />
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
                <button class="list_btn btn_s" @click="this.isStepExpend = !this.isStepExpend" :disabled="isDesktop">
                    <font-awesome-icon icon="fa-solid fa-box-open" />
                </button>
                <button class="checkout_btn btn_s" @click="payCheck">
                    結帳
                </button>
            </div>
        </aside>
    </div>
</template>
<script>
import productList from "@/assets/data/productList.js";
// import {multiWeekCartList } from "@/assets/data/payCartList.js";
export default {
    data() {
        return {
            productList,
            uniqueAllergy: [],
            isAdjustExpend: false,
            isStepExpend: false,
            isDesktop: false,
            isStepOneExpend: false,
            isStepTwoExpend: false,
            isActive: false,
            // 點擊移動至對應區塊(定義滾動目標區塊的 `ref` 名稱)
            sectionRefs: {
                main: null,
                soup: null,
                salad: null,
            },
            optionsPlan: [
                { value: "單次購買", label: "單次購買" },
                { value: "定期配送", label: "定期配送" },
            ],
            optionsMeal: [4, 6, 10],
            optionsWeek: [2, 3, 4],
            selectedOptionPlan: "", // 儲存選中的選項
            selectedOptionMeal: 0, // 儲存選中的選項
            selectedOptionWeek: 1, // 儲存選中的選項
            tabActive: 1,
            cartList: [[]],
        };
    },
    computed: {
        //篩選菜色類別
        mainDishFilter() {
            let filterResult = [];
            this.productList.forEach((item, index) => {
                if (item.category == "主菜") {
                    filterResult.push(this.productList[index]);
                }
            });
            return filterResult;
        },
        soupFilter() {
            let filterResult = [];
            this.productList.forEach((item, index) => {
                if (item.category == "湯品") {
                    filterResult.push(this.productList[index]);
                }
            });
            return filterResult;
        },
        saladFilter() {
            let filterResult = [];
            this.productList.forEach((item, index) => {
                if (item.category == "沙拉") {
                    filterResult.push(this.productList[index]);
                }
            });
            return filterResult;
        },
        cartTotalAmount() {
            let total = 0;
            this.cartList[this.tabActive - 1].forEach((item) => {
                total += item.amount;
            });
            return total;
        },
        isCartFull() {
            if (this.selectedOptionPlan === "單次購買") {
                return false;
            } else if (
                this.selectedOptionPlan === "定期配送" &&
                this.cartTotalAmount >= this.selectedOptionMeal
            ) {
                return true;
            } else {
                return false;
            }
        },
        // isCartSelectDone() {
        //     let isSelectDone = this.cartList.every((index) => {
        //         let total = 0;
        //         this.cartList[index].forEach((item) => {
        //             total += item.amount;
        //         });
        //         console.log(index, total);
        //         return total > 0
        //     });
        //     return isSelectDone;
        // },
    },
    methods: {
        isCartSelectDone() {

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
        stepOneExpend() {
            this.isStepOneExpend = !this.isStepOneExpend;
            this.cartList = [[]];
            this.selectedOptionPlan = "";
            this.selectedOptionMeal = 1;
            this.selectedOptionWeek = 0;
            this.tabActive = 1;
            this.isStepTwoExpend = false;
        },
        //方案是否有被選完
        isPlanSelectDone() {
            if (this.selectedOptionPlan === "單次購買") {
                this.isStepTwoExpend = true;
                this.isStepOneExpend = false;
                this.selectedOptionWeek = 1;
            } else if (
                this.selectedOptionPlan === "定期配送" &&
                this.selectedOptionMeal !== 1 &&
                this.selectedOptionWeek !== 0
            ) {
                this.isStepTwoExpend = true;
                this.isStepOneExpend = false;
            } else {
                return;
            }
            for (let i = 1; i < this.selectedOptionWeek; i++) {
                this.cartList.push([]);
            }
        },
        // tap:week點擊後保持樣式(修改)
        updateTab(index) {
            if (this.tabActive === index) {
                // this.tabActive = null;
                return;
            } else {
                this.tabActive = index;
            }
        },
        //------------ 購物車------------
        // 禁止購物車數量<0
        amountReduce(index) {
            let target = this.cartList[this.tabActive - 1][index];
            if (target.amount == 1) {
                return;
            } else {
                target.amount--;
            }
        },
        amountIncrease(index) {
            let target = this.cartList[this.tabActive - 1][index];
            if (!this.isCartFull) {
                target.amount++;
            }
        },
        //加入側邊購物欄
        addCart(index, list) {
            if (this.isCartFull) return;
            //判斷是否有在購物車裡，沒有的話
            let compareResult = this.cartList[this.tabActive - 1].filter(
                (item) => {
                    return item.name === list[index].name;
                }
            );

            if (compareResult.length == 0) {
                let addItem = {};
                addItem.amount = 1;
                addItem.name = list[index].name;
                addItem.category = list[index].category;
                addItem.img = list[index].img;
                this.cartList[this.tabActive - 1].push(addItem);
            } else {
                compareResult[0].amount++;
            }
        },
        // 取消商品
        removeCart(index) {
            this.cartList[this.tabActive - 1].splice(index, 1);
        },
        payCheck() {
            if (!this.isCartSelectDone) {
                alert("購物車未選完");
                return;
            } else {
                this.$store.commit("stateCartList", this.cartList);
                this.$store.commit("statePlan", {
                    plan: this.selectedOptionPlan,
                    meal: this.selectedOptionMeal,
                    week: this.selectedOptionWeek
                });
                this.$router.push("/pay");
            }
        },
        // 螢幕寬度大於768自動顯示
        handleResize() {
            this.isDesktop = window.innerWidth >= 768;
        },
    },
    created() {
        // 不包含的食材
        this.collectUniqueNames();
        this.cartList = this.$store.state.cartList
        if (this.cartList[0].length > 0) {
            this.isStepOneExpend = false
            this.isStepTwoExpend = true
            this.selectedOptionPlan = this.$store.state.shopPlan.plan
            this.selectedOptionMeal = this.$store.state.shopPlan.meal
            this.selectedOptionWeek = this.$store.state.shopPlan.week
        }
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
