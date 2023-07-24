<template>
  <!-- banner滑卡區 -->
  <div class="container_index">
    <div class="decorate_index">
      <div class="index_banner_slider">
        <div class="decorate_day">
          <img src="@/assets/images/index/index_happy.png" alt="">
        </div>
        <!-- 字左 -->
        <div class="index_text">
          <div>
            <p>每日命定料理！</p><br>
            <p>左右滑動找到屬於你的菜</p>
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
        <button class="index_btn_l">更多食譜</button>
      </div>
      <!-- 字右 -->
      <div class="index_food_title">
        <p>清爽無負擔</p>
        <div class="line">
          <span>希臘烤羊肉</span>
        </div>
      </div>
    </div>
  </div>
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

    };
  },

  methods: {
    
  },

  mounted() {

  },
});
</script>


<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/home/homeFlipcard.scss";
</style>




