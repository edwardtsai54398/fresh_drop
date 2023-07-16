<template>
    <!-- <carousel :items-to-show="1.5"> -->
    <carousel  v-bind="settings" :breakpoints="breakpoints" :wrap-around="true"><!--要循環要加 :wrap-around="true"-->
      <slide v-for="slide in example" :key="slide">
        <!-- slide: 輪播的物件; 10: 改成你要v-for的陣列(寫在data裡) -->
        <div class="box">
            
            {{ slide }}
        </div>
      </slide>
  
      <template #addons>
        <navigation /><!--左右按鈕元件，可拿掉-->
        <pagination /><!--頁籤元件，可拿掉-->
      </template>
    </carousel>
  </template>
  
  <script>
  // If you are using PurgeCSS, make sure to whitelist the carousel CSS classes
//   import 'vue3-carousel/dist/carousel.css'
//   import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
//   //Pagination: 長方形頁籤; Navigation: 左右件; 可視需求拿掉
  
//   export default {
//     name: 'App',
//     components: {
//       Carousel,
//     Slide,
//       Pagination,
//       Navigation,
//     },
//     data() {
//         return {
//             example:['Vue','Javascript', 'Sass', 'Gulp', '敏捷開發'],
//         }
//     },
//   }

//斷點
import { defineComponent } from 'vue'
import { Carousel, Navigation, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

export default defineComponent({
  name: 'Break-points',
  components: {
    Carousel,
    Slide,
    Navigation,
  },
  data: () => ({
    // carousel settings
    settings: {
      itemsToShow: 1,
      snapAlign: 'center',
    },
    // breakpoints are mobile first
    // any settings not specified will fallback to the carousel settings
    breakpoints: {
      // 700px and up
      700: {
        itemsToShow: 2,
        snapAlign: 'center',
      },
      // 1024 and up
      1024: {
        itemsToShow: 2,
        snapAlign: 'center',
      },
    },
    // 放自己的data
    example:['Vue','Javascript', 'Sass', 'Gulp', '敏捷開發'],
  }),
})
</script>

  <style lang="scss">
  @import "@/assets/scss/all.scss";
    section.carousel{
        padding: 100px 0;
    }
    .box{
        background-color: $secondary;
        width: 200px;
        height: 400px;
    }
    .carousel__next, .carousel__prev{
        transition: .3s;
        @extend .btn_flat;
        aspect-ratio: 1/1;
        border-radius: 50%;
        position: absolute;
        svg{
            fill: $primary;
        }
        &:hover{
            transform: translateY(-50%);
            svg{
                fill: #fff;
            }
        }
    }
    .carousel__prev{
        &::before{
            right: -100%;
        }
    }
  </style>