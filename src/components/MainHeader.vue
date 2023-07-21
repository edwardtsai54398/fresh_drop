<template>
  <header class="mainheader">
    <div class="circle" v-for="n in headCircleQty" :key="n"
    :style="{width:100/headCircleQty+'%'}"></div>
    
    <button class="hamburger" @click="isToggleOpen = !isToggleOpen; isSubCartOpen = false; isSourceToggleOpen = false">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="header_logo">
      <router-link to="/"><h1>鮮食空投箱 Fresh Drop</h1></router-link>
    </div>
    <!-- @click="isToggleOpen = false" -->
    <nav class="main_nav" 
    :class="{ open: isToggleOpen }" >
      <router-link to="/about" @click="isToggleOpen = false"><h4>關於我們</h4></router-link>
      <div class="sub_toggle">
        <div class="subtoggle_btn" @click="isSourceToggleOpen = !isSourceToggleOpen">
          <h4>食材溯源</h4>
          <font-awesome-icon icon="fa-solid fa-chevron-right" />
        </div>
        <nav class="sub_toggle_list" 
        :class="{open : isSourceToggleOpen}" >
          <div class="goback" 
          @click="isSourceToggleOpen = false">
          <font-awesome-icon icon="fa-solid fa-chevron-left" />
        </div>
          <router-link to="/source" 
          @click="isSourceToggleOpen = false; isToggleOpen = false">
            <h5>各地小農介紹</h5>
          </router-link>
          <router-link to="/meat" 
          @click="isSourceToggleOpen = false; isToggleOpen = false">
            <h5>安心肉品</h5>
          </router-link>
          <router-link to="/certified" 
          @click="isSourceToggleOpen = false; isToggleOpen = false">
            <h5>相關認證</h5>
          </router-link>
        </nav>
      </div>
      <router-link to="/shop" @click="isToggleOpen = false"><h4>菜色選購</h4></router-link>
      <router-link to="/giftcard" @click="isToggleOpen = false"><h4>禮物卡</h4></router-link>
      <router-link to="/faq" @click="isToggleOpen = false"><h4>FAQ</h4></router-link>
      
      <div class="sub_toggle">
        <div class="subtoggle_btn cart_toggle_btn" @click="isSubCartOpen = true">
          <div class="title_wrap">
            <h4>購物車</h4>
            <figure class="shopping_bag">
              <img src="@/assets/images/icon_bg/shoppingBag_black.svg" alt="" v-if="headCircleQty>1">
              <img src="@/assets/images/icon_bg/shoppingBag_fff.svg" alt="" v-else-if="headCircleQty<=1">
              <figcaption>16</figcaption>
            </figure>
          </div>
          <font-awesome-icon icon="fa-solid fa-chevron-right" />
        </div>
        <div class="sub_toggle_cart" :class="{open : isSubCartOpen}">
          <div class="goback" 
          @click="isSubCartOpen = false">
          <font-awesome-icon icon="fa-solid fa-chevron-left" />
          </div>
          <div class="cart_content">
            <ol class="week_tabs">
              <li class="tab active">
                week1
              </li>
              <li class="tab">
                week2
              </li>
              <li class="tab">
                week3
              </li>
              
            </ol>
            <ul class="cart_list">
              <li class="cart_item">
                <div class="dish_pic">
                  <div class="pic">
                    <img src="@/assets/images/product/1tomaot_egg.jpg" alt="">
                  </div>
                  <div class="amount">4</div>
                </div>
                <div class="category">主菜</div>
                <div class="name">滑嫩番茄蛋</div>
              </li>
            </ul>
            <div class="group_btn">
              <router-link class="btn_s btn_flat" to="/shop" @click="isSubCartOpen = false; isToggleOpen=false">繼續選購</router-link>
              <router-link class="btn_s" to="/pay"
              @click="isSubCartOpen = false; isToggleOpen=false">結帳</router-link>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <button class="member" @click="$emit('toggle')" :class="{had_login:$store.state.isLogin}">
      <img src="@/assets/images/icon_bg/header_member.svg" alt="" v-if="!$store.state.isLogin"/>
      <div class="pic avatar_img" v-if="$store.state.isLogin">
        <img :src="$store.state.memberInfoAll.avatarImg" alt="" >
      </div>
      <h4>{{$store.state.memberInfoAll.name ? $store.state.memberInfoAll.name : '會員登入'}}</h4>
      <div class="member_center" :class="{open:centerOpen}">
        <router-link to="/member"><span>會員中心</span></router-link>
        <div @click="logOut"><span>登出</span></div>
      </div>
    </button>
    <div class="circle" v-if="headCircleQty == 0"></div>
  </header>
  
</template>

<script>

// import modalClose from '@/components/modalClose.vue'
export default {
  name: 'modalClose',
  props: {
    centerOpen: Boolean,
  },
  data() {
    return {
      isToggleOpen: false,
      isSourceToggleOpen: false,
      isSubCartOpen: false,
      headCircleQty: 5
    };
  },
  created() {
    window.addEventListener('resize', this.circleQty)
  },
  mounted() {
    this.circleQty()
  },
  methods: {
    circleQty() {
      let windowW = window.innerWidth
      // let circle = document.querySelectorAll('.circle')
      if(windowW < 768){
        this.headCircleQty = 5

      }else if(windowW >= 768 && windowW < 1024){
        this.headCircleQty = 7
      }else if(windowW >= 1024 && windowW < 1200){
        this.headCircleQty = 9
      }
      // circle.style.width= windowW / this.headCircleQty
      if(windowW >= 1200){
        this.headCircleQty = 0
        // let circle = document.querySelector('.circle')
        // circle.style.width= 0
      }
    },
    logOut() {
      this.F2ERefugee = {}
      this.isLogin = false
      this.$router.push('/')
    }
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/header.scss";
</style>