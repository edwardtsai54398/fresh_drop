<template>
  <div class="container pay_container">
      <h4 class="pay_title">| 結帳 |</h4>
      <ul class="single_cart_content" v-show="cartList.length == 1">
        <li class="cart_item" v-for="item in compareCartNumberSingle" :key="item.number">
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
            <div class="price">200元</div>
            <div class="total_price"></div>
          </div>
          
        </li>
      </ul>
      <div class="multi_cart_content"></div>
      <button class="btn_s btn_flat keep_shopping" @click="fetchProduct">繼續選購</button>
      <!-- 禮物卡選項 -->
      <div class="calc_pay">
        <div class="calc_wrap"><span>商品金額</span><span>{{calcTotalPrice}}元</span></div>
        <div class="calc_wrap"><span>禮物卡折抵</span><span>-元</span></div>
        <div class="calc_wrap"><span>運費</span><span>{{freight}}元</span></div>
        <div class="calc_total"><span>合計</span><span>{{calcTotalPrice + freight}}元</span></div>
      </div>

      <div class="pay_info">
        <h5>收件人資訊</h5>
        <div class="radio_wrap">
            <input type="radio" name="mem_info" id="mem_info" class="circle">
            <label for="mem_info">同會員資料</label>
        </div>
        <div class="input_group">
            <input type="text" placeholder="請輸入姓名">
            <input type="text" placeholder="請輸入電話">
            <div class="select_wrap">
                <div class="row">
                    <div class="col-6">
                        <select name="" id="sent_city" 
                        class="city_select normal_select">
                            <option value="" 
                            v-for="city in twDistrict" 
                            :key="city.name">{{ city.name }}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="" id="sent_district" 
                        class="city_select normal_select">
                            <option value="" 
                            v-for="city in twDistrict" 
                            :key="city.name">{{ city.name }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="text" placeholder="請輸入地址">
        </div>

      </div>
      <div class="payment">
        <h5>付款方式</h5>
        <div class="row">
            <div class="col">
                <div class="radio_wrap">
                    <input type="radio" name="payment" id="credit" class="circle">
                    <label for="credit">信用卡</label>
                </div>
            </div>
            <div class="col">
                <div class="radio_wrap">
                    <input type="radio" name="payment" id="atm" class="circle">
                    <label for="atm">ATM轉帳</label>
                </div>
            </div>
            <div class="col">
                <div class="radio_wrap">
                    <input type="radio" name="payment" id="cash" class="circle">
                    <label for="cash">貨到付款</label>
                </div>
            </div>
        </div>
        <div class="credit_card" :class="{flip_toB : !creditCardSide}">
            <div class="a_side">
               <div class="credit_16num">
                <input type="text" name="" id="" class="credit_4num" max="4">
                <span> - </span>
                <input type="text" name="" id="" class="credit_4num" max="4">
                <span> - </span>
                <input type="text" name="" id="" class="credit_4num" max="4">
                <span> - </span>
                <input type="text" name="" id="" class="credit_4num" max="4">
               </div> 
               <img src="@/assets/images/icon_bg/credit_sensor.svg" alt="">
               <input type="text" name="" id="" 
               placeholder="請輸入信用卡上的姓名" class="holder_name">
               <button class="toB_side_btn"  @click="creditCardSide = false">Back<img src="@/assets/images/icon_bg/return_icon.svg" alt=""></button>
            </div>
            <div class="b_side">
                <div class="magnet_bar"></div>
                <input type="text" class="security_code" placeholder="安全碼" max="3">
                <div class="exp">
                    <div class="title">有效日期</div>
                    <div class="exp_date_wrap">
                        <input type="" class="date_m" max="2" placeholder="月">
                        <span> / </span>
                        <input type="" class="date_y" max="2" placeholder="年">
                    </div>
                </div>
                <button class="toA_side_btn" @click="creditCardSide = true"><img src="@/assets/images/icon_bg/return_icon.svg" alt="">Front</button>
            </div>
        </div>
        <p class="note">*本司心用卡付款使用第三方支付，點擊結帳將前往藍新金流付款頁面。</p>
        <button class="btn_scd_m pay_btn">結帳</button>
      </div>
  </div>
</template>
<script>
import productList from "@/assets/data/productList.js";
import twDistrict from "@/assets/data/cityDistrict.js";
import axios from 'axios'
// const multiWeekCartList = [
//     [
//         {content:'#01001', amount: 1},
//         {content:'#01002', amount: 1},
//         {content:'#01003', amount: 1},
//         {content:'#01004', amount: 1}
//     ],
//     [
//         {content:'#01005', amount: 2},
//         {content:'#01006', amount: 1},
//         {content:'#02001', amount: 1},
//     ],
//     [
//         {content:'#02002', amount: 1},
//         {content:'#02003', amount: 1},
//         {content:'#01002', amount: 2},
//     ],
// ]
const cartList = [
    [
        {content:'#01001', amount: 2},
        {content:'#01002', amount: 1},
        {content:'#01004', amount: 2},
        {content:'#01003', amount: 1}

    ]
]

export default {
    data() {
        return {
            lessonProduct: [],
            cartList: cartList,
            productList,
            compareCartList: [],
            freight: 80,
            discount: 0,
            giftcardDiscount: 0,
            twDistrict,
            creditCardSide: true,
            loading: false,
        }
    },
    computed: {
        compareCartNumberSingle() {
            let compareResult = this.productList.filter(product => {
                return this.cartList[0].some((cartItem) => {
                    return cartItem.content === product.number;
                })
            })
            let compareArry = []
            
            compareResult.forEach(product => {
                this.cartList[0].forEach(cartItem => {
                    let cartDetail = {
                        name: '',
                        number: '',
                        amount: 0,
                        category: '',
                        img: ''
                    }
                    cartDetail.name = product.name
                    cartDetail.number = product.number
                    cartDetail.category = product.category
                    cartDetail.img = product.img
                    if(cartItem.content == cartDetail.number){
                        cartDetail.amount = cartItem.amount
                    }else{return}
                    compareArry.push(cartDetail)
                })
            })
            // this.compareCartList = compareArry。
            return compareArry
        },
        calcTotalPrice() {
            let total = 0
            this.compareCartNumberSingle.forEach(item => {
                total += item.amount*200
            })
            return total
        }
    },
    methods: {
        fetchProduct() {
            // fetch('https://fakestoreapi.com/products')
            // .then(res => res.json())
            // .then(json => {console.log(json);})
            this.loading = true
            axios('https://fakestoreapi.com/products')
            .then((response) => {
                console.log(response);
                this.lessonProduct = response.data
            })
            .catch((error) => {
                console.log(error.message);
            })
            .finally(() => {
                this.loading = false
            })
        },
        toProductDetail(id) {
            this.$router.push(`/product/:${id}`)
        }
    }
}
</script>
<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/pay.scss";
</style>