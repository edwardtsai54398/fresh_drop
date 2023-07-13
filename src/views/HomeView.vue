<template>
  <div class="container index_container">
    <div class="container_index">
      <div class="decorate_index">
        <div class="decorate_day">
          <img src="../assets/images/index/index_decorate_vg3.png" alt="">
        </div>

        <div class="index_text">
          <h2>每日命定料理！</h2><br>
          <p>左右滑動找到屬於你的菜</p>
        </div>

        <div class="index_banner">
          <div class="btn_circle btn_flat">NEXT</div>
          <div class="index_btn_l">更多食譜</div>
        <!-- <div v-for="item in productList" :key="item.id">{{ item.img }}</div> 
        <div v-for="item in productList" :key="item.id">{{ searchFilter(id) }}</div> -->
        <div class=".index_index_banner_swiper">
          <swiper
              :effect="'cards'"
              :grabCursor="true"
              :modules="modules"
              class="mySwiper"
            >
              <!-- <swiper-slide v-for="item in productList" :key="item.id">
                <div class="swiper_pic">
                  <img :src="item.img" alt="">
                </div>
              </swiper-slide>  -->
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
          </swiper>
        </div> 
      </div>  
    </div>  
    <div class="index_health">
      <h3>HEALTH <br> VEGETABLE</h3>
      <div class="index_health_pic">
        <img src="../assets/images/index/index_vefetable.png" alt="">
      </div>
      <div class="index_health_pic">
        <img src="../assets/images/index/index_vefetable1.png" alt="">
      </div>
      <div class="index_health_pic">
        <img src="../assets/images/index/index_vefetable2.png" alt="">
      </div>
      <div class="index_health_pic">
        <img src="../assets/images/index/index_vefetable3.png" alt="">
      </div>
      <div class="index_health_pic">
        <img src="../assets/images/index/index_vefetable4.png" alt="">
      </div>
    </div>
  </div> 
  </div> 
  
 
 
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'

  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';

  // Import Swiper styles
  import 'swiper/css';

  import 'swiper/css/effect-cards';

  // import './style.css';

  // import required modules
  import { EffectCards } from 'swiper/modules';


  import productList from '@/assets/data/productList.js';

export default {
  name: "HomeView",
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      aa: 'AAAA',
      modules:[EffectCards],
      searchList: productList
    }
  },
};




  // export default {
  //   components: {
  //     Swiper,
  //     SwiperSlide,
  //   },
  //   data() {
  //     return {
  //       aa: 'AAAA',
  //       modules:[EffectCards]
  //     }
  //   },
  //   mounted() {

  //   },
    
  // };

</script> 

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
// @import "@/assets/scss/index.scss";
@import "@/assets/scss/page/home.scss";
</style> 



