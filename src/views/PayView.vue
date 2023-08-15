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
                <li class="cart_item" v-for="item in cartList[0]" :key="item.number">
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
                    <slide v-for="(slide, index) in cartList" :key="slide" class="one_week">
                        <div class="week_name">WEEK{{ index + 1 }}</div>
                        <ul class="cart_list">
                            <li class="cart_item" v-for="item in slide" :key="item.name">
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

                <div class="price">{{ calcTotalPrice }}元</div>
                <div class="total_price">{{ calcTotalPrice }}元</div>
            </div>
            <div class="gift_cart_content" v-if="giftBuy">
                <div class="gift_item">
                    <div class="gift_pic pic">
                        <img :src="giftBuy.img" alt="" />
                    </div>
                    <div class="gift_info">
                        <p>收禮人：{{ giftBuy.name }}</p>
                    </div>
                </div>
                <div class="price">{{ giftBuy.money }}元</div>
                <div class="total_price">{{ giftBuy.money }}元</div>
            </div>
        </div>
        <button class="btn_s btn_flat keep_shopping" @click.prevent="$router.go(-1)">繼續選購</button>
        <div class="calc_pay">
            <div class="giftcard_select" v-if="giftcardsOwned.length > 0
                && !$store.state.giftBuy">
                <SelectComponent :customOptions="giftRemainFilter" :placeholder="'禮物卡折抵'" @func="chooseGiftDiscount" />
            </div>
            <div class="calc_wrap">
                <span>商品金額</span>
                <span>{{ calcTotalPrice }}元</span>
            </div>
            
            <div class="calc_wrap" v-show="cartList.length > 1">
                <span>優惠折抵</span>
                <span>-{{ discount() }}元</span>
            </div>
            <div class="calc_wrap" v-show="giftcardDiscount">
                <span>禮物卡折抵</span>
                <span>-{{ giftcardDiscount }}元</span>
            </div>
            <div class="calc_wrap" v-show="!giftBuy">
                <span>運費</span>
                <span>{{ freightCalc() }}元</span>
            </div>
            <div class="calc_total">
                <span>合計</span>
                <span>{{ payPrice }}元</span>
            </div>
        </div>

        <form action="">
            <fieldset class="pay_info" v-if="!giftBuy">
                <legend>收件人資訊</legend>
                <div class="radio_wrap">
                    <input type="radio" name="mem_info" id="mem_info" class="circle" @change="bindMemInfo" />
                    <label for="mem_info">同會員資料</label>
                </div>
                <div class="input_group">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" placeholder="請輸入姓名" v-model="sendCus" />
                        </div>
                        <div class="col-6">
                            <input type="tel" placeholder="請輸入電話" v-model="sendPhone" />
                        </div>
                    </div>
                    <input type="text" placeholder="請輸入地址" v-model="sendAddress" />
                </div>
            </fieldset>
            <fieldset class="payment">
                <legend>付款方式</legend>
                <div class="row">
                    <div class="col">
                        <div class="radio_wrap">
                            <input type="radio" name="payment" id="credit" class="circle" />
                            <label for="credit">信用卡</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="radio_wrap">
                            <input type="radio" name="payment" id="atm" class="circle" />
                            <label for="atm">ATM轉帳</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="radio_wrap">
                            <input type="radio" name="payment" id="cash" class="circle" />
                            <label for="cash">貨到付款</label>
                        </div>
                    </div>
                </div>
                <div class="credit_card" :class="{ flip_toB: !creditCardSide }">
                    <div class="a_side">
                        <div class="credit_16num">
                            <input type="tel" name="" id="num4" class="credit_4num" maxlength="4" @input="checkMax" />
                            <span>-</span>
                            <input type="tel" name="" id="num8" class="credit_4num" maxlength="4" @input="checkMax" />
                            <span>-</span>
                            <input type="tel" name="" id="num12" class="credit_4num" maxlength="4" @input="checkMax" />
                            <span>-</span>
                            <input type="tel" name="" id="num16" class="credit_4num" maxlength="4" @input="checkMax" />
                        </div>
                        <img src="@/assets/images/icon_bg/credit_sensor.svg" alt="" />
                        <input type="text" name="" id="" placeholder="請輸入信用卡上的姓名" class="holder_name" />
                        <button class="toB_side_btn" @click.prevent="creditCardSide = false">
                            Back
                            <img src="@/assets/images/icon_bg/return_icon.svg" alt="" />
                        </button>
                    </div>
                    <div class="b_side">
                        <div class="magnet_bar"></div>
                        <input type="text" class="security_code" placeholder="安全碼" maxlength="3" @input="toNextInput" />
                        <div class="exp">
                            <div class="title">有效日期</div>
                            <div class="exp_date_wrap">
                                <input type="" class="date_m" maxlength="2" placeholder="月" @input="checkMax" />
                                <span>/</span>
                                <input type="" class="date_y" maxlength="2" placeholder="年" @input="checkMax" />
                            </div>
                        </div>
                        <button class="toA_side_btn" @click.prevent="creditCardSide = true">
                            <img src="@/assets/images/icon_bg/return_icon.svg" alt="" />
                            Front
                        </button>
                    </div>
                </div>
            </fieldset>
            <p class="remark">*本司心用卡付款使用第三方支付，點擊結帳將前往藍新金流付款頁面。</p>
            <button class="btn_scd_m pay_btn" @click="pay">結帳</button>

            <form ref="emailForm" @submit.prevent="sendEmail" style="display: none;">
                <input type="email" v-model="this.giftBuy.email" name="email" />
                <input type="text" v-model="this.giftBuy.name" name="name"/>
                <input type="text" :value="$store.state.memberInfoAll.info.cus_acc" name="sender">
            </form>
        </form>
    </div>
</template>
<script>
import { Carousel, Pagination, Slide } from "vue3-carousel";
import SelectComponent from "@/components/SelectComponent.vue";
import emailjs from 'emailjs-com';

export default {
    components: {
        Carousel,
        Pagination,
        Slide,
        SelectComponent,
    },
    data() {
        return {
            cartList: [[]],
            giftBuy: {},
            giftcardsOwned: [],
            giftRemainArr: [],
            giftcardDiscount: 0,
            discountCardNo: 0,
            creditCardNo:'1234-3456-8765-9876',
            creditName:'Chunghua Tsai',
            creditCardSide: true,
            sendCus: '',
            sendPhone: '',
            sendAddress: '',
        };
    },
    computed: {
        payPrice() {
            return this.calcTotalPrice + this.freightCalc() - this.discount() - this.giftcardDiscount
        },
        calcTotalPrice() {
            let total = 0;
            if (this.giftBuy) {
                total = this.giftBuy.money;
            } else if (this.cartList.length > 1) {
                this.cartList.forEach((week) => {
                    week.forEach((item) => {
                        total += item.amount * 200;
                    });
                });
            } else if (this.cartList.length == 1) {
                this.cartList[0].forEach((item) => {
                    total += item.amount * 200;
                });
            }
            return total;
        },
        giftRemainFilter() {
            let giftRemainArr = []
            this.giftcardsOwned.forEach(gift => {
                if (parseInt(gift.remain) > 0) {
                    giftRemainArr.push(parseInt(gift.g_no) + 3000)
                }
            })
            return giftRemainArr
        },
    },
    methods: {
        getGiftcardData() {
            let cusNo = sessionStorage.getItem('cus_no')
            let url = `${this.$url}memberDetail.php`;
            let params = new URLSearchParams();
            params.append("cusNo", cusNo);
            this.axios
                .post(url, params)
                .then((res) => {
                    console.log(res.data);
                    this.$store.commit("sendMemDetail", res.data);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        
        chooseGiftDiscount(giftNo) {
            if (typeof giftNo == 'number') {
                let gift_no = giftNo - 3000
                this.discountCardNo = gift_no
                let chosenCard = this.giftcardsOwned.find(gift => {
                    return gift.g_no == gift_no
                })
                this.giftcardDiscount = parseInt(chosenCard.remain)
                if (this.giftcardDiscount > this.calcTotalPrice - this.discount()) {
                    this.giftcardDiscount = this.calcTotalPrice - this.discount()
                }
            } else { 
                this.giftcardDiscount = 0
            }
        },
        checkMax(e) {
            let Target = e.target;
            let valLen = Target.value.length;
            let maxLen = Target.getAttribute("maxlength");
            if (valLen >= maxLen) {
                let nextInput = Target.nextElementSibling;
                if (nextInput === null) {
                    return;
                } else {
                    while (nextInput !== null && nextInput.tagName !== "INPUT") {
                        nextInput = nextInput.nextElementSibling;
                        nextInput.focus();
                    }
                }
            }
        },
        toNextInput(e) {
            let Target = e.target;
            let valLen = Target.value.length;
            let maxLen = Target.getAttribute("maxlength");
            if (valLen >= maxLen) {
                let nextInput = document.querySelector(".date_m");
                nextInput.focus();
            }
        },
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
        bindMemInfo() {
            console.log('');
            this.sendCus = this.$store.state.memberInfoAll.info.cus_name
            this.sendPhone = this.$store.state.memberInfoAll.info.phone
            this.sendAddress = this.$store.state.memberInfoAll.info.address
        },
        pay() {
            event.preventDefault()
            let url = `${this.$url}createOrder.php`;
            let params = new URLSearchParams();
            params.append("cusNo", this.$store.state.memberInfoAll.info.cus_no);
            if (this.giftBuy) {
                this.sendEmail();
                params.append("type", "giftcard");
                params.append("reciveCusEmail", this.giftBuy.email);
                params.append("pic", this.giftBuy.img);
                params.append("money", this.giftBuy.money);
            } else if (this.cartList[0].length>0) {
                params.append("type", "single_cart");
                params.append("payment", 1);
                params.append("ord_price", this.calcTotalPrice + this.freightCalc() - this.discount());
                params.append("discount_price", this.giftcardDiscount);
                params.append("discount_cardno", this.discountCardNo);
                params.append("address", this.sendAddress);
                params.append("cusName", this.sendCus);
                params.append("phone", this.sendPhone);
                params.append("credit_no", this.creditCardNo);
                params.append("credit_name", this.creditName);
                params.append("week", 1);
                console.log(JSON.stringify(this.cartList));
                params.append("cart",JSON.stringify(this.cartList));
                if (this.cartList.length > 1) {
                    params.append("type", "multi_week");
                }
                
            }
            this.axios
                .post(url, params)
                .then((res) => {
                    if (res.data == "success") {
                        alert('訂單完成')
                        this.$store.commit('clearState', 'gift')
                        this.$store.commit('clearState', 'cart')
                        this.$router.push('/index')
                    }
                    
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        sendEmail() {
            const emailParams = {
                name: this.giftBuy.name,
                email: this.giftBuy.email,
                sender: this.$store.state.memberInfoAll.info.cus_acc,
            };
            emailjs.sendForm(
                'service_98rszzb',
                'template_stjo8xt',
                this.$refs.emailForm, //  Use the form reference here
                'JyHk3JXY97U_5Xu0S',
                emailParams
            )
                .then((result) => {
                    console.log('SUCCESS!', result.text);
                })
                .catch((error) => {
                    console.log('FAILED...', error.text);
                });
        },
    },
    watch: {
        "$store.state.memberInfoAll": {
            hamdler: function (newval) {
                this.giftcardsOwned = newval.giftcard
            },
            deep: true
        }
    },
    created() {
        this.giftBuy = this.$store.state.giftBuy;
        this.cartList = this.$store.state.cartList;
    },
    mounted() {
        this.getGiftcardData()
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "vue3-carousel/dist/carousel.css";
@import "@/assets/scss/page/pay.scss";
</style>
