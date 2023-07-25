<template>
  <!-- banner滑卡區 -->
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
          <span>左右滑動找到屬於你的菜</span>
        </div>
        <div class="index_carrot pic">
          <img src="@/assets/images/index/index_decorate_carrot.png" alt="">
        </div>
      </div>
    </div>
    <!-- 中間滑卡 -->
    <div class="index_index_banner_swiper">
      <!-- 下一張按鈕 -->
      <button class="btn_circle btn_flat">NEXT►</button>
      <swiper :effect="'cards'" :grabCursor="true" :modules="modules" class="mySwiper">
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/1tomaot_egg.jpg" alt="">
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/2creamy_beer_clam.jpg" alt="">
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/3basil_eggplant.jpg" alt="">
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/4grill_clam.jpg" alt="">
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/5mapo_tofu.jpg" alt="">
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/2creamy_beer_clam.jpg" alt="">
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/23thai_hot_sour_soup.jpg" alt="">
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/31vietnam_beef_salad.jpg" alt="">
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper_pic">
            <img src="@/assets/images/product/23thai_hot_sour_soup.jpg" alt="">
          </div>
        </swiper-slide>
      </swiper>
    </div>
    <!-- 字右 -->
    <div class="index_food_title">
      <p>清爽無負擔</p>
      <div class="line">
        <span>希臘烤羊肉</span>
      </div>
      <button class="index_btn_l">更多食譜</button>
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
      breakpoints: {
        700: {
          itemsToShow: 3.5,
          snapAlign: 'center',
        },
        1024: {
          itemsToShow: 5.5,
          snapAlign: 'center',
        },
        1200: {
          itemsToShow: 6,
          snapAlign: 'center',
        },
      },
      farmerImg: [
        require('@/assets/images/index/farme1.jpg'),
        require('@/assets/images/index/farme1.jpg'),
        require('@/assets/images/index/farme1.jpg'),
      ],
      vegetables: [
        { name: 'Chinese cabbage', image: require('@/assets/images/index/index_vefetable.png') },
        { name: 'cauliflower', image: require('@/assets/images/index/index_vefetable1.png') },
        { name: 'Green pepper', image: require('@/assets/images/index/index_vefetable2.png') },
        { name: 'onion', image: require('@/assets/images/index/index_vefetable3.png') },
        { name: 'Chinese cabbage', image: require('@/assets/images/index/index_vefetable4.png') },
      ]
      // currentIndex: 0, // 当前显示的内容索引
    };
  },

});
</script>


<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/home/homeFlipcard.scss";
</style>




