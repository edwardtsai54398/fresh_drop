<template>
  <div class="container index_container">
    <!-- banner滑卡區 -->
    <section class="container_index">
      <div class="decorate_index">
        <div class="index_banner_slider">
          <div class="decorate_day">
            <img src="../assets/images/index/index_happy.png" alt="">
          </div>
          <!-- 字左 -->
          <div class="index_text">
            <div>
              <p>每日命定料理！</p><br>
              <p>左右滑動找到屬於你的菜</p>
            </div>
            <div class="index_carrot pic">
              <img src="../assets/images/index/index_decorate_carrot.png" alt="">
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
                <img src="../assets/images/product/1tomaot_egg.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/2creamy_beer_clam.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/3basil_eggplant.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/4grill_clam.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/5mapo_tofu.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/2creamy_beer_clam.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/23thai_hot_sour_soup.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/31vietnam_beef_salad.jpg" alt="">
              </div>
            </swiper-slide>
            <swiper-slide>
              <div class="swiper_pic">
                <img src="../assets/images/product/23thai_hot_sour_soup.jpg" alt="">
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
    </section>

    <!-- 水果滑動區 -->
    <section class="index_health_banner" style="display: none;">
      <p>HEALTH<br>VEGETABLE</p>
      <div class="index_health_wrap">
        <div class="index_health" ref="box">
          <div class="index_health_pic pic" v-for="(vegetable, index) in vegetables" :key="index">
            <img :src="vegetable.image" alt="">
            <h3>{{ vegetable.name }}</h3>
          </div>
        </div>
      </div>
    </section>
    <!--  小農輪播區-->
    <section class="framer" style="display: none;">
      <p>｜小農介紹｜</p>
      <Carousel v-bind="settings" :breakpoints="breakpoints" :wrap-around="true">
        <Slide v-for="item in farmerImg" :key="item">

          <div class="index_farmer_pic">
            <img :src="item" alt="">
          </div>
        </Slide>
        <template #addons>
          <Navigation />
        </template>
      </Carousel>
    </section>


    <!-- 訂購流程 -->
    <section class="index_order">
      <div class="green_line">
        <img src="../assets/images/index/line_green.png" alt="">
      </div>
      <div class="green_line1">
        <img src="../assets/images/index/line_green.png" alt="">
      </div>
      <div class="order_text">
        <p>｜訂購流程｜</p>
      </div>
      <div class="index_orderpic" v-for="item in index_order" :key="item">
        <h3>{{ item.title }}</h3>
        <p>{{ item.description }}</p>
        <div class="index_order_pic">
          <img :src="item.image" alt="">
        </div>
      </div>
    </section>
  </div>
  <!-- 訂閱方案 -->
  <section class="index_subscription">
    <p>｜訂購流程｜</p>
    <div class="index_menu">
      <h3>1.一次配送幾餐?</h3>
    </div>
    <div class="index_8drop">
      <div class="index_drop">
        <h4>8 DROP</h4>
      </div>

      <div class="index_drop_box">
        <div class="index_drop_pic">
          <img src="../assets/images/index/imdex_box.png" alt="">
        </div>
        <div class="index_money">
          <h4>原價1600元</h4>
          <div class="sale_text">
            <h4>特價1220元</h4>
          </div>
          <div class="sale_menu_text">
            <h4>(一餐省下40元)</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="index_8drop">
      <div class="index_drop">
        <h4>8 DROP</h4>
      </div>

      <div class="index_drop_box">
        <div class="index_drop_pic">
          <img src="../assets/images/index/imdex_box.png" alt="">
        </div>
        <div class="index_money">
          <h4>原價1600元</h4>
          <div class="sale_text">
            <h4>特價1220元</h4>
          </div>
          <div class="aa">
            <h4>(一餐省下40元)</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="index_8drop">
      <div class="index_drop">
        <h4>8 DROP</h4>
      </div>
      <div class="index_drop_box">
        <div class="index_drop_pic">
          <img src="../assets/images/index/imdex_box.png" alt="">
        </div>
        <div class="index_money">
          <h4>原價1600元</h4>
          <div class="sale_text">
            <h4>特價1220元</h4>
          </div>
          <div class="aa">
            <h4>(一餐省下40元)</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="index_one">
      <h3>2.隔多久配送一次?</h3>
    </div>
    <div class="index_button">
      <div class="index_button_week">
        <div class="index_btn_l_button">
          <div class="text_number">2</div>周
        </div>
      </div>
      <div class="index_button_week">
        <div class="index_btn_l_button">
          <div class="text_number">2</div>周
        </div>
      </div>
      <div class="index_button_week">
        <div class="index_btn_l_button">
          <div class="text_number">2</div>周
        </div>
      </div>
    </div>
    <div class="index_illustrate">
      <h3>從第二次訂購開始，您可以選擇跳過、暫停或取消訂閱。我們沒有設定任何訂單次數的限制，也沒有與暫停或取消訂閱相關的違約金。</h3>
    </div>
    <div class="index_btn_l_more">更多食譜</div>

  </section>
</template>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { defineComponent } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import 'swiper/css';
import 'swiper/css/effect-cards';
import 'vue3-carousel/dist/carousel.css';
import { EffectCards } from 'swiper/modules';

export default defineComponent({
  name: 'HomeView',
  components: {
    Swiper,
    SwiperSlide,
    Carousel,
    Slide,
    Navigation,
  },
  data() {
    return {
      aa: 'AAAA',
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
        require('../assets/images/index/farme1.jpg'),
        require('../assets/images/index/farme1.jpg'),
        require('../assets/images/index/farme1.jpg'),
      ],
      index_order: [
        {
          title: '瀏覽菜色列表',
          description: '點擊菜色選購頁面，可以使用分類列表或瀏覽不同的頁面找到喜愛的餐點。點擊餐點圖片進入詳細頁面，進一步了解食材來源及製作方法。',
          image: require('../assets/images/about/about_step1.svg'),
        },
        {
          title: '選擇您喜愛的食材',
          description: '在菜色選購頁面，您可以選擇想要的訂閱方案及菜色品項。指定要配送的週期、購買的數量、或其他相關選項（如過敏原及不包含的食材）。',
          image: require('../assets/images/about/about_step2.svg'),
        },
        {
          title: '加入購物車',
          description: '一旦您選擇好菜色的數量和規格，點擊「訂單確認」按鈕。把選購的菜色添加到購物車中。您可以選擇繼續購物、或者前往結帳。也可以修改訂閱方案，選擇一次想要幾份餐，以及多久配送一次，買越多省越多！',
          image: require('../assets/images/about/about_step3.svg'),
        },
        {
          title: '結帳與支付',
          description: '準備結帳。您需要填寫聯繫方式及送貨地址，並提供支付方式的相關資訊。填寫完畢後，請檢查訂單詳細內容並確保一切正確無誤，點擊「結帳」按鈕進入結帳系統支付。',
          image: require('../assets/images/about/about_step4.svg'),
        },
        {
          title: '詢問及配送',
          description: '等待物流配送至目的地的同時，您可以在會員中心查看歷史記錄及追蹤訂單狀態，讓您了解發貨情況和預計到達時間。如需修改配送选项也可以在会员中心或与客服团队联系的情况下进行修改。我們會判專員盡快與您回覆！',
          image: require('../assets/images/about/about_step5.svg'),
        },
      ],
      vegetables: [
        { name: 'Chinese cabbage', image: require('../assets/images/index/index_vefetable.png') },
        { name: 'cauliflower', image: require('../assets/images/index/index_vefetable1.png') },
        { name: 'Green pepper', image: require('../assets/images/index/index_vefetable2.png') },
        { name: 'onion', image: require('../assets/images/index/index_vefetable3.png') },
        { name: 'Chinese cabbage', image: require('../assets/images/index/index_vefetable4.png') },
      ]
      // currentIndex: 0, // 当前显示的内容索引
    };
  },

  methods: {
    handleScroll() {
      const container = this.$el;
      const scrollTop = container.scrollTop || container.scrollTop;
      const windowHeight = container.clientHeight || container.innerHeight;
      const scrollHeight = container.scrollHeight || container.offsetHeight;

      const scrollPercentage = scrollTop / (scrollHeight - windowHeight);
      const newIndex = Math.floor(scrollPercentage * this.index_order.length);

      this.currentIndex = newIndex;
    },

    handleScroll1() {
      if (scrollY >= 800 && scrollY <= 4000) {
        let scrollY = window.scrollY;
        let box = document.querySelector('.index_health');
        box.style.transform = `translateX(-${scrollY - 800}px)`;
        // box.style.transform = `translateX(-${scrollY-2000}px)`;
      }
      // console.log(scrollY)
    }
  },

  mounted() {
    window.addEventListener('scroll', this.handleScroll1);

  },
});
</script>

<style lang="scss" scoped>
// @import "@/assets/scss/index.scss";
@import "@/assets/scss/page/home.scss";
</style> 



