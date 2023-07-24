<template>
  <!--  小農輪播區-->
  <section class="framer">
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
</template>
<script>
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

export default {
  name: 'HomeView',
  components: {
    Carousel,
    Slide,
    Navigation,
  },
  data() {
    return {
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
};
</script>


<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/home/homeFramer.scss";
</style>



