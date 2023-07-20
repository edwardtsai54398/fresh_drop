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
          <div class="btn_circle btn_flat">NEXT►</div>
          <div class="index_btn_l">更多食譜</div>
          <div class="index_index_banner_swiper">
          <swiper
              :effect="'cards'"
              :grabCursor="true"
              :modules="modules"
              class="mySwiper"
            >
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
        </div> 
      </div>  
    </div>  
    </div>
    <div class="index_health">
      <h3>HEALTH<br>VEGETABLE</h3>
      <div class="index_vg">
        <div class="index_health_pic">
          <img src="../assets/images/index/index_vefetable.png" alt="">
          <h3>Chinese cabbage</h3>
        </div>
        <div class="index_health_pic">
          <img src="../assets/images/index/index_vefetable1.png" alt="">
          <h3>cauliflower</h3>
        </div>
        <div class="index_health_pic">
          <img src="../assets/images/index/index_vefetable2.png" alt="">
          <h3>Green pepper</h3>
        </div>
        <div class="index_health_pic">
          <img src="../assets/images/index/index_vefetable3.png" alt="">
          <h3>pumpkin</h3>
        </div>
        <div class="index_health_pic">
          <img src="../assets/images/index/index_vefetable4.png" alt="">
          <h3>onion</h3>
        </div>
      </div>
    </div>

    <!--  -->
    <div class="framer">
      <h3>小農介紹</h3>
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
    </div>

    <!-- <div class="index_order">
      <div class="index_orderpic" v-for="(item, index) in index_order" :key="index">
        <h2>{{ item.title }}</h2>
        <p>{{ item.description }}</p>
        <div class="index_order_pic">
          <img :src="item.image" alt="">
        </div>
      </div>
    </div> -->

    <div class="index_order">
      <div class="index_orderpic" v-for="item in index_order" :key="item">
        <h2>{{ item.title }}</h2>
        <p>{{ item.description }}</p>
        <div class="index_order_pic">
          <img :src="item.image" alt="">
        </div>
      </div>
    </div> 
  </div>  
  
  <div class="index_subscription">
    <h2>訂閱方案</h2>
    <div class="index_menu">
      <h3>.一次配送幾餐?</h3>
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
    <h3>隔多久配送一次?</h3>
  </div>
  <div class="index_button">
    <div class="index_button_week">
      <div class="index_btn_l_button"><div class="text_number">2</div>周</div>
    </div>
    <div class="index_button_week">
      <div class="index_btn_l_button"><div class="text_number">2</div>周</div>
    </div>
    <div class="index_button_week">
      <div class="index_btn_l_button"><div class="text_number">2</div>周</div>
    </div>
    </div>
    <div class="index_illustrate">
          <h3>從第二次訂購開始，您可以選擇跳過、暫停或取消訂閱。我們沒有設定任何訂單次數的限制，也沒有與暫停或取消訂閱相關的違約金。</h3> 
    </div>
    <div class="index_btn_l_more">更多食譜</div>
 
  </div>

  <div id="app">
    <div class="intro">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, at
        velit sint facere ipsam doloremque placeat vel impedit sapiente alias.
      </p>
      <p>SCROLL TO CONTINUE</p>
    </div>

    <div class="main">
      <div class="main__graphic">{{ currStep }}</div>
      <Scrollama
        :debug="true"
        :offset="0.5"
        @step-enter="({ element }) => (currStep = element.dataset.stepNo)"
      >
        <div class="step" data-step-no="1">step 1</div>
        <div class="step" data-step-no="2">step 2</div>
        <div class="step" data-step-no="3">step 3</div>
        <div class="step" data-step-no="4">step 4</div>
      </Scrollama>
    </div>

    <div class="outro">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, at velit
      sint facere ipsam doloremque placeat vel impedit sapiente alias.
    </div>
  </div>
 
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
      },
      farmerImg: [
        require('../assets/images/index/farme1.jpg'),
        require('../assets/images/index/farme1.jpg'),
        require('../assets/images/index/farme1.jpg')
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
          description: '等待物流配送至目的地的同時，您可以在會員中心查看歷史記錄，以及追蹤訂單狀態，讓您了解發貨情況和預計到達時間。',
          image: require('../assets/images/about/about_step5.svg'),
        },
      ],
      currentIndex: 0, // 当前显示的内容索引
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
  },
});
</script>

<!-- <script>
  import { Scrollama } from 'vue-scrollama';
  import 'intersection-observer';

  export default {
    components: {
      Scrollama,
    },
    // 其他组件选项
  };
</script> -->
<style lang="scss" scoped>
// @import "@/assets/scss/index.scss";
// @import "@/assets/scss/page/home.scss";

</style> 



