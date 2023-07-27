<template>
    <div class="container pay_container">
        <h4 class="pay_title">| 結帳 |</h4>
        <div class="cart_content_all">
            <div class="cart_title">
                <h6>商品名稱</h6>
                <h6>單價</h6>
                <h6>總計</h6>
            </div>
            <ul class="single_cart_content" v-if="cartList.length == 1">
                <li
                    class="cart_item"
                    v-for="item in cartList[0]"
                    :key="item.number"
                >
                    <div class="dishes">
                        <div class="dishes_pic">
                            <div class="amount">{{ item.amount }}</div>
                            <div class="pic">
                                <img :src="item.img" alt="" />
                            </div>
                        </div>
                        <div class="dishes_name">
                            <div class="category">{{ item.category }}</div>
                            <div class="name">{{ item.name }}</div>
                        </div>
                    </div>
                    <div class="price">200元</div>
                    <div class="total_price">{{ 200 * item.amount }}元</div>
                </li>
            </ul>
            <div class="multi_cart_content" v-if="cartList.length > 1">
                <carousel :items-to-show="1" class="weeks">
                    <slide
                        v-for="(slide, index) in cartList"
                        :key="slide"
                        class="one_week"
                    >
                        <div class="week_name">WEEK{{ index + 1 }}</div>
                        <ul class="cart_list">
                            <li
                                class="cart_item"
                                v-for="item in slide"
                                :key="item.name"
                            >
                                <div class="pic dishes_pic">
                                    <img :src="item.img" alt="" />
                                </div>
                                <div class="category">{{ item.category }}</div>
                                <div class="name">{{ item.name }}</div>
                                <div class="amount">X{{ item.amount }}</div>
                            </li>
                        </ul>
                    </slide>
                    <template #addons>
                        <pagination />
                    </template>
                </carousel>

                <div class="price">200元</div>
                <div class="total_price">{{ calcTotalPrice }}元</div>
            </div>
            <div class="gift_cart_content" v-if="giftBuy.name">
                <div class="gift_item">
                    <div class="gift_pic pic">
                        <img :src="giftBuy.img" alt="" />
                    </div>
                    <div class="gift_info">
                        <!-- <p>禮物卡樣式：{{ giftBuy.type }}</p> -->
                        <p>收禮人：{{ giftBuy.name }}</p>
                    </div>
                </div>
                <div class="price">{{ giftBuy.money }}元</div>
                <div class="total_price">{{ giftBuy.money }}元</div>
            </div>
        </div>
        <button class="btn_s btn_flat keep_shopping" @click.prevent="$router.go(-1)">
            繼續選購
        </button>
        <div class="calc_pay">
            <div class="calc_wrap">
                <span>商品金額</span><span>{{ calcTotalPrice }}元</span>
            </div>
            <div class="calc_wrap" v-show="!giftBuy">
                <span>禮物卡折抵</span><span>-元</span>
            </div>
            <div class="calc_wrap" v-show="cartList.length > 1">
                <span>優惠折抵</span><span>-{{ discount() }}元</span>
            </div>
            <div class="calc_wrap" v-show="!giftBuy">
                <span>運費</span><span>{{ freightCalc() }}元</span>
            </div>
            <div class="calc_total">
                <span>合計</span
                ><span
                    >{{ calcTotalPrice + freightCalc() - discount() }}元</span
                >
            </div>
        </div>

        <form action="">
            <fieldset class="pay_info">
                <legend>收件人資訊</legend>
                <div class="radio_wrap">
                    <input
                        type="radio"
                        name="mem_info"
                        id="mem_info"
                        class="circle"
                    />
                    <label for="mem_info">同會員資料</label>
                </div>
                <div class="input_group">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" placeholder="請輸入姓名" />
                        </div>
                        <div class="col-6">
                            <input type="text" placeholder="請輸入電話" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <select
                                name=""
                                id="sent_city"
                                class="city_select normal_select"
                            >
                                <option value="" disabled selected>
                                    請選擇縣市
                                </option>
                                <option
                                    value=""
                                    v-for="city in twDistrict"
                                    :key="city.name"
                                >
                                    {{ city.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select
                                name=""
                                id="sent_district"
                                class="city_select normal_select"
                            >
                                <option value="" disabled selected>
                                    請選擇行政區
                                </option>
                                <option
                                    value=""
                                    v-for="city in twDistrict"
                                    :key="city.name"
                                >
                                    {{ city.name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <input type="text" placeholder="請輸入地址" />
                </div>
            </fieldset>
            <fieldset class="payment">
                <legend>付款方式</legend>
                <div class="row">
                    <div class="col">
                        <div class="radio_wrap">
                            <input
                                type="radio"
                                name="payment"
                                id="credit"
                                class="circle"
                            />
                            <label for="credit">信用卡</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="radio_wrap">
                            <input
                                type="radio"
                                name="payment"
                                id="atm"
                                class="circle"
                            />
                            <label for="atm">ATM轉帳</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="radio_wrap">
                            <input
                                type="radio"
                                name="payment"
                                id="cash"
                                class="circle"
                            />
                            <label for="cash">貨到付款</label>
                        </div>
                    </div>
                </div>
                <div class="credit_card" :class="{ flip_toB: !creditCardSide }">
                    <div class="a_side">
                        <div class="credit_16num">
                            <input
                                type="text"
                                name=""
                                id=""
                                class="credit_4num"
                                max="4"
                            />
                            <span> - </span>
                            <input
                                type="text"
                                name=""
                                id=""
                                class="credit_4num"
                                max="4"
                            />
                            <span> - </span>
                            <input
                                type="text"
                                name=""
                                id=""
                                class="credit_4num"
                                max="4"
                            />
                            <span> - </span>
                            <input
                                type="text"
                                name=""
                                id=""
                                class="credit_4num"
                                max="4"
                            />
                        </div>
                        <img
                            src="@/assets/images/icon_bg/credit_sensor.svg"
                            alt=""
                        />
                        <input
                            type="text"
                            name=""
                            id=""
                            placeholder="請輸入信用卡上的姓名"
                            class="holder_name"
                        />
                        <button
                            class="toB_side_btn"
                            @click.prevent="creditCardSide = false;"
                        >
                            Back<img
                                src="@/assets/images/icon_bg/return_icon.svg"
                                alt=""
                            />
                        </button>
                    </div>
                    <div class="b_side">
                        <div class="magnet_bar"></div>
                        <input
                            type="text"
                            class="security_code"
                            placeholder="安全碼"
                            max="3"
                        />
                        <div class="exp">
                            <div class="title">有效日期</div>
                            <div class="exp_date_wrap">
                                <input
                                    type=""
                                    class="date_m"
                                    max="2"
                                    placeholder="月"
                                />
                                <span> / </span>
                                <input
                                    type=""
                                    class="date_y"
                                    max="2"
                                    placeholder="年"
                                />
                            </div>
                        </div>
                        <button
                            class="toA_side_btn"
                            @click.prevent="creditCardSide = true;"
                        >
                            <img
                                src="@/assets/images/icon_bg/return_icon.svg"
                                alt=""
                            />Front
                        </button>
                    </div>
                </div>
            </fieldset>
            <p class="note">
                *本司心用卡付款使用第三方支付，點擊結帳將前往藍新金流付款頁面。
            </p>
            <button class="btn_scd_m pay_btn">結帳</button>
        </form>
    </div>
</template>
<script>
import twDistrict from "@/assets/data/cityDistrict.js";
import { Carousel, Pagination, Slide } from "vue3-carousel";
export default {
    components: {
        Carousel,
        Pagination,
        Slide,
    },
    data() {
        return {
            cartList: [[]],
            giftBuy: {},
            giftcardDiscount: 0,
            twDistrict,
            creditCardSide: true,
        };
    },
    computed: {
        calcTotalPrice() {
            let total = 0;
            if (this.cartList.length > 1) {
                this.cartList.forEach((week) => {
                    week.forEach((item) => {
                        total += item.amount * 200;
                    });
                });
            } else if (this.cartList.length == 1) {
                this.cartList[0].forEach((item) => {
                    total += item.amount * 200;
                });
            } else if (this.giftBuy !== {}) {
                total = this.giftBuy.money;
            }
            return total;
        },
    },
    methods: {
        freightCalc() {
            if (this.giftBuy) {
                return 0;
            } else {
                return 80;
            }
        },
        discount() {
            if (this.cartList.length > 1) {
                return this.calcTotalPrice * 0.2;
            } else {
                return 0;
            }
        },
    },
    created() {
        this.giftBuy = this.$store.state.giftBuy;
        this.cartList = this.$store.state.cartList;
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "vue3-carousel/dist/carousel.css";
@import "@/assets/scss/page/pay.scss";
</style>
