<template>
    <div class="main_wrap">
        <!-- 菜色分類 -->
        <aside class="selectmain" :class="{ 'scroll-up': isScrollUp }">
            <div class="select_bar" ref="navbar">
                <button
                    class="item"
                    :class="{ active: activeNavItem === 0 }"
                    @click.prevent="scrollToSection('main')"
                >
                    主菜
                </button>
                <button
                    class="item"
                    :class="{ active: activeNavItem === 1 }"
                    @click.prevent="scrollToSection('soup')"
                >
                    湯品
                </button>
                <button
                    class="item"
                    :class="{ active: activeNavItem === 2 }"
                    @click.prevent="scrollToSection('salad')"
                >
                    沙拉
                </button>
            </div>
            <!-- 不包含的食材 -->
            <div class="select_adjust">
                <button class="btn_s adjust" @click="adjustExpend">
                    <font-awesome-icon icon="fa-solid fa-sliders" />
                </button>
            </div>
        </aside>

        <transition name="mask" mode="out-in" appear>
            <!-- 不包含的食材遮罩 -->
            <div
                class="mask"
                v-show="isAdjustExpend"
                @click="adjustExpend"
            ></div
        ></transition>
        <transition name="hatefood" mode="out-in" appear>
            <!-- 不包含的食材內容 -->
            <div class="hatefood" v-show="isAdjustExpend">
                <p class="title">不包含的食材</p>
                <div class="cant">
                    <!-- 過敏原 -->
                    <p class="subtitle">過敏原</p>
                    <div
                        class="allergy"
                        v-for="allergy in uniqueAllergy"
                        :key="allergy"
                    >
                        <span>{{ allergy.name }}</span>
                        <input
                            type="checkbox"
                            :value="allergy.name"
                            v-model="tempSelectedAllergies"
                            class="custom_checkbox"
                        />
                    </div>
                    <!-- 不喜愛的 -->
                    <p class="subtitle">不喜愛的</p>
                    <div
                        class="dislike"
                        v-for="dislike in uniqueDislike"
                        :key="dislike"
                    >
                        <input
                            type="checkbox"
                            :value="dislike.name"
                            v-model="tempSelectedDislikes"
                            class="custom_checkbox"
                        />
                        <span>{{ dislike.name }}</span>
                    </div>
                </div>
                <p class="text">
                    如果您有不食用上述以外的食材，請

                    <router-link to="/about" class="connect"
                        >聯繫我們</router-link
                    >，謝謝。
                </p>
                <div class="adjust_btn">
                    <button class="cross btn_s" @click="adjustExpend">
                        <font-awesome-icon icon="fa-solid fa-xmark" />
                    </button>
                    <button
                        class="down btn_s"
                        @click="applyFiltersAndUpdateProductList"
                    >
                        設定完成
                    </button>
                </div>
            </div>
        </transition>
        <!-- 菜色選擇 -->
        <section class="info">
            <div class="food_pic pic" v-if="recipeData.length > 0">
                <!-- 開發用 -->
                <img
                    :src="`/data_images/product/${recipeData[0].recipe_pic}`"
                    alt=""
                />
                <!-- 上線用 -->
                <!-- <img
                    :src="`/chd102/g2/data_images/product/${recipeData[0].recipe_pic}`"
                    alt="food"
                /> -->
            </div>
            <!-- 主菜 -->
            <section class="container" id="main">
                <h4 class="menu_title" v-show="productMainDish.length > 0">
                    主菜 MAIN DISH
                </h4>
                <div class="wrap_main_dish row">
                    <div
                        class="card col-6 col-md-4"
                        v-for="(item, index) in productMainDish"
                        :key="index"
                    >
                        <router-link
                            @click="sendProductDetail(item)"
                            to="/product"
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
                            <h3>{{ item.recipe_name }}</h3>
                        </router-link>
                        <div
                            class="btn_scd_s"
                            @click="addCart(index, productMainDish)"
                        >
                            選購
                        </div>
                    </div>
                </div>
            </section>
            <!-- 湯品 -->
            <section class="container" id="soup">
                <h4 class="menu_title" v-show="productSoup.length > 0">
                    湯品 SOUP
                </h4>
                <div class="wrap_main_dish row">
                    <div
                        class="card col-6 col-md-4"
                        v-for="(item, index) in productSoup"
                        :key="index"
                    >
                        <router-link
                            @click="sendProductDetail(item)"
                            to="/product"
                        >
                            <div class="pic">
                                <!-- 開發用 -->
                                <img
                                    :src="`/data_images/product/${item.recipe_pic}`"
                                    alt=""
                                />
                                <!-- 上線用 -->
                                <!-- <img :src="`/chd102/g2/data_images/product/${item.recipe_pic}`" alt=""/> -->
                            </div>
                            <h3>{{ item.recipe_name }}</h3>
                        </router-link>
                        <div
                            class="btn_scd_s"
                            @click="addCart(index, productSoup)"
                        >
                            選購
                        </div>
                    </div>
                </div>
            </section>
            <!-- 沙拉 -->
            <section class="container" id="salad">
                <h4 class="menu_title" v-show="productSalad.length > 0">
                    沙拉 SALAD
                </h4>
                <div class="wrap_main_dish row">
                    <div
                        class="card col-6 col-md-4"
                        v-for="(item, index) in productSalad"
                        :key="index"
                    >
                        <router-link
                            @click="sendProductDetail(item)"
                            to="/product"
                        >
                            <div class="pic">
                                <!-- 開發用 -->
                                <img
                                    :src="`/data_images/product/${item.recipe_pic}`"
                                    alt=""
                                />
                                <!-- 上線用 -->
                                <!-- <img :src="`/chd102/g2/data_images/product/${item.recipe_pic}`" alt=""/> -->
                            </div>
                            <h3>{{ item.recipe_name }}</h3>
                        </router-link>
                        <div
                            class="btn_scd_s"
                            @click="addCart(index, productSalad)"
                        >
                            選購
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!-- 清單、結帳按鈕 -->
        <aside class="choosewrap" :class="{ 'scroll-up': isScrollUp }">
            <!-- 訂購步驟遮罩 -->
            <transition name="mask" mode="out-in" appear>
                <div
                    class="mask"
                    v-show="isStepExpend"
                    @click="isStepExpend = !isStepExpend"
                ></div>
            </transition>
            <transition name="step" mode="out-in" appear>
                <!-- 訂購步驟 -->
                <div class="step_wrap" v-show="isStepExpend || isDesktop">
                    <!-- 步驟一 -->
                    <div class="step one">
                        <div class="title" @click="stepOneExpend">
                            <p>
                                <font-awesome-icon
                                    :style="{ color: '#1F8D61' }"
                                    icon="fa-solid fa-box-archive"
                                />
                            </p>
                            <p><span>step.1</span>{{ stepOneText }}</p>
                            <p>
                                <font-awesome-icon
                                    :style="{ color: '#1F8D61' }"
                                    icon="fa-solid fa-plus"
                                />
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
                                        <div
                                            class="option_plan"
                                            v-for="option in optionsPlan"
                                            :key="option.value"
                                            @click="
                                                selectedOptionPlan =
                                                    option.value;
                                                isPlanSelectDone();
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
                                                selectedOptionPlan ===
                                                '單次購買'
                                            "
                                        >
                                            <p>請前往下一步選擇餐點</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="wrap"
                                    v-if="selectedOptionPlan == '定期配送'"
                                >
                                    <div>
                                        <p>2.每周幾份餐點</p>
                                    </div>
                                    <div class="choose">
                                        <div
                                            class="option_meal"
                                            v-for="option in optionsMeal"
                                            :key="option"
                                            @click="
                                                selectedOptionMeal = option;
                                                isPlanSelectDone();
                                            "
                                            :class="{
                                                selected:
                                                    selectedOptionMeal ===
                                                    option,
                                                radio_plan: true,
                                            }"
                                        >
                                            {{ option }}份
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="wrap"
                                    v-if="selectedOptionPlan == '定期配送'"
                                >
                                    <div>
                                        <p>3.連續寄送幾周</p>
                                    </div>
                                    <div class="choose">
                                        <div
                                            class="option_week"
                                            v-for="option in optionsWeek"
                                            :key="option"
                                            @click="
                                                selectedOptionWeek = option;
                                                isPlanSelectDone();
                                            "
                                            :class="{
                                                selected:
                                                    selectedOptionWeek ===
                                                    option,
                                                radio_plan: true,
                                            }"
                                        >
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
                                <font-awesome-icon
                                    :style="{
                                        color: '#1F8D61',
                                    }"
                                    icon="fa-solid fa-bowl-food"
                                />
                            </p>
                            <p><span>step.2</span>選擇餐點</p>
                            <p>
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
                            <div
                                class="content_two"
                                v-show="isStepTwoExpend"
                                :class="{ 'scroll-up-content': isScrollUp }"
                            >
                                <!-- 總數、全部刪除按鈕 -->
                                <div class="topbtn">
                                    <!-- 總數量 -->
                                    <div
                                        class="total_count"
                                        v-show="
                                            selectedOptionPlan == '定期配送'
                                        "
                                    >
                                        {{ cartWeekAmount }}/{{
                                            selectedOptionMeal
                                        }}<span>份</span>
                                    </div>
                                    <div
                                        class="total_count"
                                        v-show="
                                            selectedOptionPlan == '單次購買'
                                        "
                                    >
                                        {{ cartWeekAmount }}<span>份</span>
                                    </div>
                                    <div
                                        class="btn_s delete"
                                        @click="removeCartAll"
                                    >
                                        全部刪除
                                    </div>
                                </div>
                                <!-- 頁籤 -->
                                <div
                                    class="week_tap"
                                    v-show="selectedOptionPlan === '定期配送'"
                                >
                                    <div
                                        class="week"
                                        v-for="n in selectedOptionWeek"
                                        :key="n"
                                        :class="{ active: n == tabActive }"
                                        @click="updateTab(n)"
                                    >
                                        WEEK{{ n }}
                                    </div>
                                </div>

                            <div class="dishes" v-for="n in selectedOptionWeek" :key="n" v-show="tabActive == n">
                                <p class="no_item" v-show="cartList[tabActive - 1].length == 0">
                                    購物欄內目前沒有商品
                                </p>
                                <div class="circle" v-for="(item, index) in cartList[n - 1]" :key="index">
                                    <div class="dishes_pic">
                                        <!-- 開發用 -->
                                        <img :src="`/data_images/product/${item.recipe_pic}`" />
                                        <!-- 上線用 -->
                                        <!-- <img :src="`/chd102/g2/data_images/product/${item.recipe_pic}`" /> -->
                                    </div>
                                    <div class="dishes_content">
                                        <div class="category_and_cancel">
                                            <div class="category" v-show="item.class == 0">主菜</div>
                                            <div class="category" v-show="item.class == 1">湯品</div>
                                            <div class="category" v-show="item.class == 2">沙拉</div>
                                            <button class="cancel" @click="removeCart(index)">
                                                <font-awesome-icon icon="fa-solid fa-trash-can" />
                                            </button>
                                        </div>
                                        <div class="dishes_title">
                                            <h2>{{ item.recipe_name }}</h2>
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
                <button
                    class="list_btn btn_s"
                    @click="isStepExpend = !isStepExpend"
                    :disabled="isDesktop"
                >
                    <font-awesome-icon icon="fa-solid fa-box-open" />
                </button>
                <button class="checkout_btn btn_s" @click="payCheck">
                    結帳
                </button>
            </div>
        </aside>
        <!-- enter_hint遮罩 -->
        <div
            class="mask"
            v-show="isEnterHintVisible"
            @click="closeEnterHint"
        ></div>
        <!-- step one圖示 < 1024 -->
        <div
            class="shop_btn step_one_hint_mb"
            v-show="isEnterHintVisible"
            @click="closeEnterHint"
        >
            <button class="list_btn btn_s step_one_hint_mb_btn">
                <font-awesome-icon icon="fa-solid fa-box-open" />
            </button>
        </div>
        <!-- step one圖示 > 1024 -->
        <div
            class="step one step_one_hint_pc"
            v-show="isEnterHintVisible"
            @click="closeEnterHint"
        >
            <div class="title">
                <p>
                    <font-awesome-icon
                        :style="{ color: '#1F8D61' }"
                        icon="fa-solid fa-box-archive"
                    />
                </p>
                <p><span>step.1</span>選擇方案</p>
                <p>
                    <font-awesome-icon
                        :style="{ color: '#1F8D61' }"
                        icon="fa-solid fa-plus"
                    />
                </p>
            </div>
        </div>
        <!-- enter_hint彈窗 < 1024 -->
        <div class="enter_hint_mb" v-show="isEnterHintVisible">
            <div class="start">
                <p>請從「選擇方案」開始</p>
            </div>
            <div class="close">
                <p class="btn_s" @click="closeEnterHint">關閉</p>
            </div>
        </div>
        <!-- enter_hint彈窗 > 1024 -->
        <div class="enter_hint_pc" v-show="isEnterHintVisible">
            <div class="start">
                <p>請從「選擇方案」開始</p>
            </div>
            <div class="close">
                <p class="btn_s" @click="closeEnterHint">關閉</p>
            </div>
        </div>
    </div>
</template>
<script>
import productList from "@/assets/data/productList.js";
import { payCheck, isCartSelectDone } from "@/assets/js/cart.js";
export default {
    data() {
        return {
            productList,
            uniqueAllergy: [],
            uniqueDislike: [],
            isAdjustExpend: false,
            isStepExpend: false,
            isDesktop: false,
            isStepOneExpend: false,
            isStepTwoExpend: false,
            isActive: false,
            recipeData: [],

            //enter_hint
            isEnterHintVisible: false,

            //選擇方案替換文字
            stepOneText: "選擇方案",
            optionsPlan: [
                { value: "單次購買", label: "單次購買" },
                { value: "定期配送", label: "定期配送" },
            ],
            optionsMeal: [4, 6, 10],
            optionsWeek: [2, 3, 4],
            selectedOptionPlan: "",
            selectedOptionMeal: 0,
            selectedOptionWeek: 1,
            tabActive: 1,
            cartList: [[]],

            //choosewrap scroll-up
            isScrollUp: true,
            prevScrollY: 0,
            isToggleOpen: false,

            //篩選過敏原/不喜愛的食材
            selectedAllergies: [],
            selectedDislikes: [],
            filteredProductList: [], // 儲存篩選後的結果
            tempSelectedAllergies: [], // 暫存選取的過敏原
            tempSelectedDislikes: [], // 暫存選取的不喜愛的食材
            clickedDownBtn: false, // 追蹤是否點擊了 down btn_s 按鈕

            //select_bar變色
            activeNavItem: 0,
        };
    },
    computed: {
        cartWeekAmount() {
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
                this.cartWeekAmount >= this.selectedOptionMeal
            ) {
                return true;
            } else {
                return false;
            }
        },
        isCartSelectDone() {
            //從cart.js引入
            return isCartSelectDone(this.selectedOptionMeal, this.cartList);
        },
        //篩選菜色
        productListWithAllergy() {
            return this.recipeData.filter(
                (v) =>
                    !v.allergys.some(
                        (u) => this.selectedAllergies.indexOf(u) > -1
                    )
            );
        },

        productListWithDislike() {
            return this.productListWithAllergy.filter(
                (v) =>
                    !v.dislikes.some(
                        (u) => this.selectedDislikes.indexOf(u) > -1
                    )
            );
        },

        productMainDish() {
            return this.productListWithDislike.filter((v) => v.class === "0");
        },
        productSoup() {
            return this.productListWithDislike.filter((v) => v.class === "1");
        },
        productSalad() {
            return this.productListWithDislike.filter((v) => v.class === "2");
        },
    },
    methods: {
        getAllergData() {
            let url = `${this.$url}allergy.php`;

            this.axios
                .get(url)
                .then((res) => {
                    console.log(res.data);
                    this.uniqueAllergy = res.data[0]
                    this.uniqueDislike = res.data[1]
                })
                .catch((error) => {
                    console.log("發生錯誤:", error);
                });
        },
        updateVuexCart() {
            this.$store.commit("stateCartList", this.cartList);
        },
        // select_bar點擊移動至對應區塊 & 變色
        setActiveNavItem() {
            const scrollPosition = window.scrollY;
            const containers = document.querySelectorAll(".container");

            containers.forEach((container, index) => {
                const containerTop =
                    container.offsetTop - this.$refs.navbar.offsetHeight;
                const containerBottom = containerTop + container.offsetHeight;

                if (
                    scrollPosition >= containerTop &&
                    scrollPosition < containerBottom
                ) {
                    this.activeNavItem = index;
                }
            });
        },
        scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                let offset;
                if (window.innerWidth >= 1200) {
                    offset = 20;
                } else {
                    offset = 100;
                }
                const targetPosition =
                    section.getBoundingClientRect().top +
                    window.pageYOffset -
                    offset;

                window.scroll({
                    top: targetPosition,
                    behavior: "smooth",
                });
            }
        },

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
            this.updateVuexCart();

            //在點擊事件中根據選擇的方案更新文字;
            // if (this.selectedOptionPlan == "") {
            //     this.stepOneText = "選擇方案";
            // } else if (this.selectedOptionPlan === "單次購買") {
            //     this.stepOneText = "";
            // } else if (this.selectedOptionPlan === "定期配送") {
            //     this.stepOneText = "";
            // }
        },
        //方案是否有被選完
        isPlanSelectDone() {
            this.stepOneText = this.selectedOptionPlan;
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
            this.$store.commit("statePlan", {
                plan: this.selectedOptionPlan,
                meal: this.selectedOptionMeal,
                week: this.selectedOptionWeek,
            });
        },
        // tap:week點擊後保持樣式
        updateTab(index) {
            //從cart.js引入
            this.tabActive = index;
        },
        //------------ 購物車------------
        amountReduce(index) {
            let target = this.cartList[this.tabActive - 1][index];
            if (target.amount == 1) {
                return;
            } else {
                target.amount--;
            }
            this.updateVuexCart();
        },
        amountIncrease(index) {
            let target = this.cartList[this.tabActive - 1][index];
            if (!this.isCartFull) {
                target.amount++;
            }
            this.updateVuexCart();
        },
        //加入側邊購物欄
        addCart(index, list) {
            if (this.isCartFull) {
                alert("購物車已滿");
                return;
            } else if (this.selectedOptionPlan == "") {
                alert("你未選擇購買方案");
                this.isStepOneExpend = true;
                return;
            }

            //判斷是否有在購物車裡，沒有的話
            let compareResult = this.cartList[this.tabActive - 1].filter(
                (item) => {
                    return item.recipe_name === list[index].recipe_name;
                }
            );
            if (compareResult.length == 0) {
                let addItem = {};
                addItem.amount = 1;
                addItem.recipe_name = list[index].recipe_name;
                addItem.class = list[index].class;
                addItem.recipe_pic = list[index].recipe_pic;
                addItem.id = list[index].recipe_no;
                this.cartList[this.tabActive - 1].push(addItem);
            } else {
                compareResult[0].amount++;
            }
            this.updateVuexCart();
        },
        // 取消商品
        removeCart(index) {
            this.cartList[this.tabActive - 1].splice(index, 1);
            this.updateVuexCart();
        },
        removeCartAll() {
            this.cartList.forEach((item, index) => {
                this.cartList[index] = [];
            });
            this.updateVuexCart();
        },
        payCheck() {
            if (!this.$store.state.isLogin) {
                alert("請先登入會員");
                this.$store.state.isLoginOpen = true;
                return;
            } else if (this.$store.state.giftBuy) {
                let choose = confirm(
                    "結帳頁仍有商品未結帳，確定要把結帳頁的商品清空嗎?"
                );
                if (!choose) {
                    return;
                } else {
                    this.$store.state.giftBuy = null;
                }
            }
            //從cart.js引入
            payCheck(this.isCartSelectDone, this.cartList);
        },
        // 螢幕寬度大於1024時step_wrap自動顯示
        handleResize() {
            this.isDesktop = window.innerWidth >= 1024;
        },
        sendProductDetail(item) {
            //取出點擊商品的詳細資訊
            this.$store.commit("setProductData", { userData: item });
        },
        choosewrapInOut() {
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
        contentTwoInOut() {
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

        applyFiltersAndUpdateProductList() {
            // 保存目前的選取狀態
            this.selectedAllergies = [...this.tempSelectedAllergies];
            this.selectedDislikes = [...this.tempSelectedDislikes];

            // 隱藏不包含的食材內容
            this.isAdjustExpend = false;
        },
        // enter_hint
        closeEnterHint() {
            this.isEnterHintVisible = false;
            localStorage.setItem("isEnterHintVisible", "true"); // 將標記設置為已顯示，存儲在localStorage中
            // 當點擊 closeHint 事件後，移除滾動事件監聽器
            window.removeEventListener("scroll", this.preventScroll);
        },
        checkEnterHint() {
            const isShown = localStorage.getItem("isEnterHintVisible");
            this.isEnterHintVisible = isShown === null; // 檢查localStorage中是否有標記，若無則顯示彈窗
            // 如果彈窗顯示，則阻止頁面滾動
            if (this.isEnterHintVisible) {
                window.addEventListener("scroll", this.preventScroll);
            }
        },
        preventScroll() {
            // 阻止頁面滾動
            window.scrollTo(0, 0);
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
    },
    created() {
        this.cartList = this.$store.state.cartList;
        if (this.cartList[0].length > 0) {
            this.isStepOneExpend = false;
            this.isStepTwoExpend = true;
            this.selectedOptionPlan = this.$store.state.shopPlan.plan;
            this.selectedOptionMeal = this.$store.state.shopPlan.meal;
            this.selectedOptionWeek = this.$store.state.shopPlan.week;
        }
        window.addEventListener("scroll", this.choosewrapInOut);
    },
    mounted() {
        this.isDesktop = window.innerWidth >= 768;
        window.addEventListener("resize", this.handleResize);
        window.addEventListener("scroll", this.choosewrapInOut);

        //select_bar變色
        document.addEventListener("scroll", this.setActiveNavItem);

        //enter_hint
        this.checkEnterHint();

        //串接recipe資料庫
        this.getRecipeData();
        this.getAllergData();
    },
    beforeUnmount() {
        window.removeEventListener("resize", this.handleResize);
        window.removeEventListener("scroll", this.choosewrapInOut);

        //select_bar變色
        document.removeEventListener("scroll", this.setActiveNavItem);
    },
    unmounted() {
        window.removeEventListener("scroll", this.choosewrapInOut);
    },
};
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/shop.scss";
</style>
