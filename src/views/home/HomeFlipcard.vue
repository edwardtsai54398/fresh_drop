<template>
  <section class="decorate_index">
    <div class="index_banner_slider">
      <!-- 幸福的一天 -->
      <div class="decorate_day">
        <img src="@/assets/images/index/index_happy.png" alt="">
      </div>
      <!-- 字左 -->
      <div class="index_text">
        <div class="txt">
          <p>每日命定料理</p>
          <span>探索不同文化的烹飪風情</span>
        </div>
        <div class="index_carrot pic">
          <img src="@/assets/images/index/index_decorate_carrot.png" alt="">
        </div>
      </div>
    </div>
    <!-- 中間滑卡 -->
    <div class="index_index_banner_swiper" @mouseenter="hideElement" @mouseleave="showElement">
      <swiper :effect="'cards'" :grabCursor="true" :modules="modules" class="mySwiper">
        <swiper-slide v-for="(item, index) in cards" :key="index">
          <div class="swiper_pic">
            <img :src="item.img" alt="">
          </div>
        </swiper-slide>
        <!-- 滑動提示 -->
        <div class="running_text">
          左右滑動找到屬於你的菜
        </div>
        <div class="hand_wrap" v-if="isVisible">
          <div class="hand_pointer">
            <font-awesome-icon icon="fa-solid fa-hand-pointer" flip="horizontal" :style="{ color: '#1F8D61' }" />
          </div>
        </div>
      </swiper>



    </div>
    <!-- 字右 -->
    <div class="index_food_title">
      <p>清爽無負擔</p>
      <div class="line">
        <span>{{ cards[0].foodName }}</span>
      </div>
      <router-link to="/shop">
        <button class="index_btn_l">更多食譜</button>
      </router-link>
    </div>
  </section>
</template>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { defineComponent } from 'vue';
import 'swiper/css';
import 'swiper/css/effect-cards';
import { EffectCards } from 'swiper/modules';
export default defineComponent({
  name: 'HomeView',
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      modules: [EffectCards],
      settings: {
        itemsToShow: 1,
        snapAlign: 'center',
      },
      cards: [
        {
          img: require('@/assets/images/product/1tomaot_egg.jpg'),
          foodName: '滑嫩番茄蛋'
        },
        {
          img: require('@/assets/images/product/2creamy_beer_clam.jpg'),
          foodName: ''
        },
        {
          img: require('@/assets/images/product/3basil_eggplant.jpg'),
          foodName: ''
        },
        {
          img: require('@/assets/images/product/4grill_clam.jpg'),
          foodName: ''
        },
        {
          img: require('@/assets/images/product/5mapo_tofu.jpg'),
          foodName: ''
        },
        {
          img: require('@/assets/images/product/2creamy_beer_clam.jpg'),
          foodName: ''
        },
        {
          img: require('@/assets/images/product/23thai_hot_sour_soup.jpg'),
          foodName: ''
        },
        {
          img: require('@/assets/images/product/31vietnam_beef_salad.jpg'),
          foodName: ''
        },
        {
          img: require('@/assets/images/product/23thai_hot_sour_soup.jpg'),
          foodName: ''
        },
      ],
      isVisible: true,


    };
  },
  methods: {
    hideElement() {
      this.isVisible = false;
    },
    showElement() {
      this.isVisible = false; // 在鼠标离开时也保持隐藏状态
    }
  },

});
</script>


<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/home/homeFlipcard.scss";
</style>




