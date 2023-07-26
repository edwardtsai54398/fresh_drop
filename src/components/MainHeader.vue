<template>
    <header class="mainheader">
        <div class="circle" v-for="n in headCircleQty" :key="n" :style="{ width: 100 / headCircleQty + '%' }"></div>

        <button class="hamburger" @click="
                isToggleOpen = !isToggleOpen;
                isSubCartOpen = false;
                isSourceToggleOpen = false;
            ">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="header_logo">
            <router-link to="/">
                <h1>鮮食空投箱 Fresh Drop</h1>
            </router-link>
        </div>
        <!-- @click="isToggleOpen = false" -->
        <nav class="main_nav" :class="{ open: isToggleOpen , hide: !isScrollUp}">
            <router-link to="/about" @click="isToggleOpen = false">
                <h4>關於我們</h4>
            </router-link>
            <div class="sub_toggle">
                <div class="subtoggle_btn" @click="isSourceToggleOpen = !isSourceToggleOpen">
                    <h4>食材溯源</h4>
                    <font-awesome-icon icon="fa-solid fa-chevron-right" />
                </div>
                <nav class="sub_toggle_list" :class="{ open: isSourceToggleOpen }">
                    <div class="goback" @click="isSourceToggleOpen = false">
                        <font-awesome-icon icon="fa-solid fa-chevron-left" />
                    </div>
                    <router-link to="/source" @click="
                            isSourceToggleOpen = false;
                            isToggleOpen = false;
                        ">
                        <h5>各地小農介紹</h5>
                    </router-link>
                    <router-link to="/meat" @click="
                            isSourceToggleOpen = false;
                            isToggleOpen = false;
                        ">
                        <h5>安心肉品</h5>
                    </router-link>
                    <router-link to="/certified" @click="
                            isSourceToggleOpen = false;
                            isToggleOpen = false;
                        ">
                        <h5>相關認證</h5>
                    </router-link>
                </nav>
            </div>
            <router-link to="/shop" @click="isToggleOpen = false">
                <h4>菜色選購</h4>
            </router-link>
            <router-link to="/giftcard" @click="isToggleOpen = false">
                <h4>禮物卡</h4>
            </router-link>
            <router-link to="/faq" @click="isToggleOpen = false">
                <h4>FAQ</h4>
            </router-link>

            <div class="sub_toggle">
                <div class="subtoggle_btn cart_toggle_btn" @click="isSubCartOpen = true">
                    <div class="title_wrap">
                        <h4>購物車</h4>
                        <figure class="shopping_bag">
                            <img src="@/assets/images/icon_bg/shoppingBag_black.svg" alt="" v-if="headCircleQty > 1" />
                            <img src="@/assets/images/icon_bg/shoppingBag_fff.svg" alt="" v-else-if="headCircleQty <= 1" />
                            <figcaption>{{ calcTotalAmount() }}</figcaption>
                        </figure>
                    </div>
                    <font-awesome-icon icon="fa-solid fa-chevron-right" />
                </div>
                <div class="sub_toggle_cart" :class="{ open: isSubCartOpen }">
                    <div class="goback" @click="isSubCartOpen = false">
                        <font-awesome-icon icon="fa-solid fa-chevron-left" />
                    </div>
                    <div class="cart_content">
                        <ol class="week_tabs" v-show="cartList.length > 1">
                            <li class="tab" v-for="n in cartList.length" :key="n" 
                            :style="`width:${100/cartList.length}%`" 
                            :class="{active: n == tabActive}"
                            @click="updateTab(n)">week{{ n }}</li>
                        </ol>
                        <ul class="cart_list" v-for="(week, index) in cartList" :key="index" v-show="index+1 == tabActive">
                            <li class="cart_item" v-for="item in week" :key="item.name">
                                <div class="dish_pic">
                                    <div class="pic">
                                        <img :src="item.img" alt="" />
                                    </div>
                                    <div class="amount">{{ item.amount }}</div>
                                </div>
                                <div class="category">{{ item.category }}</div>
                                <div class="name">{{ item.name }}</div>
                            </li>
                        </ul>
                        <div class="group_btn">
                            <router-link class="btn_s btn_flat" to="/shop" @click="
                                    isSubCartOpen = false;
                                    isToggleOpen = false;
                                ">繼續選購</router-link>
                            <router-link class="btn_s" to="/pay" @click="payCheck()">結帳</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <button class="member" @click="$emit('toggle')" :class="{ had_login: $store.state.isLogin,  hide: !isScrollUp}">
            <img src="@/assets/images/icon_bg/header_member.svg" alt="" v-if="!$store.state.isLogin" />
            <div class="pic avatar_img" v-if="$store.state.isLogin">
                <img :src="$store.state.memberInfoAll.avatarImg" alt="" />
            </div>
            <h4>
                {{
                    $store.state.memberInfoAll.name
                        ? $store.state.memberInfoAll.name
                        : "會員登入"
                }}
            </h4>
            <div class="member_center" :class="{ open: centerOpen }">
                <router-link to="/member"><span>會員中心</span></router-link>
                <div @click="logOut"><span>登出</span></div>
            </div>
        </button>
        <div class="circle" v-if="headCircleQty == 0"></div>
    </header>
</template>

<script>
import { tabActive, cartList, payCheck, isCartSelectDone } from "@/assets/js/cart.js";
export default {
    name: "MainHeader",
    props: {
        centerOpen: Boolean,
    },
    data() {
        return {
            isToggleOpen: false,
            isSourceToggleOpen: false,
            isSubCartOpen: false,
            isScrollUp: true,
            prevScrollY: 0,
            tabActive, //從cart.js引入
            cartList, //從cart.js引入
            headCircleQty: 5,
        };
    },
    created() {
        window.addEventListener("resize", this.circleQty);
        window.addEventListener("scroll", this.navInOut);

    },
    mounted() {
        this.circleQty();
    },
    computed: {
        isCartSelectDone() {
            //從cart.js引入
            return isCartSelectDone(this.selectedOptionMeal)
        },
    },
    methods: {
        updateTab(index) {
            this.tabActive = index
        },
        payCheck() {
            //從cart.js引入
            payCheck(this.isCartSelectDone)
            this.isSubCartOpen = false;
            this.isToggleOpen = false;
        },
        calcTotalAmount() {
            this.cartList = this.$store.state.cartList
            let total = 0
            this.cartList.forEach((week) => {
                week.forEach((item) => {
                    total += item.amount
                })
            })
            return total ? total : ''
        },
        circleQty() {
            let windowW = window.innerWidth;
            if (windowW < 768) {
                this.headCircleQty = 5;
            } else if (windowW >= 768 && windowW < 1024) {
                this.headCircleQty = 7;
            } else if (windowW >= 1024 && windowW < 1200) {
                this.headCircleQty = 9;
            }
            if (windowW >= 1200) {
                this.headCircleQty = 0;
            }
        },
        logOut() {
            this.F2ERefugee = {};
            this.isLogin = false;
            this.$router.push("/");
        },
        navInOut() {
            let scrollY = window.scrollY
            let winW = window.innerWidth
            if (winW >= 1200 && scrollY > 100) {
                if (scrollY > this.prevScrollY) {
                    this.isScrollUp = false
                } else if (scrollY < this.prevScrollY) {
                    this.isScrollUp = true
                }
            } else {
                this.isScrollUp = true
            }
            this.prevScrollY = scrollY
        },
    },
    unmounted() {
        window.removeEventListener("resize", this.circleQty);
        window.removeEventListener("scroll", this.navInOut);
    },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/header.scss";
</style>