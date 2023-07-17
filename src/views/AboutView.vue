<template>
    <div class="about_us">
        <div class="about_us_pic">
            <img src="../assets/images/about/about.png" alt=""> 
        </div>
        <div class="about_us_text">
            <h2>品牌故事</h2>
            <p>以產地到餐桌的理念為出發點，致力於為您帶來新鮮、健康的蔬食體驗！追求最高品質的蔬食，了解食物的來源和製作過程能夠讓您更加放心和享受美食，，我們與當地的有機農場和食材供應商緊密合作，從種植到收穫，從採購到烹飪，將每一個環節都透明化，以確保食材新鮮、無農藥且營養豐富。

            在鮮食空投箱蔬食店，注重環境的保護和可持續性。我們使用環保包裝材料，減少廢棄物的產生，並鼓勵顧客參與回收和循環利用的運動。我們相信，通過選擇蔬食，我們能夠為地球的可持續發展出一份力量。
            </p>
        </div>

        <div class="about_farmer">
            <div class="farmer_pic">
                <img src="../assets/images/about/about_framer.png" alt="">
            </div>
            <div class="about_farmer_future">
                <h2>共植未來：與小農攜手耕耘</h2>
                <h3>聯繫，了解每一個食材的種植過程和背後的故事，深入了解他們所使用的種植方法、農藥的使用情況以及土地的管理方式，確保所使用的食材符合我們的高品質標準。


            與小農合作，是一個合作夥伴關係。我們互相支持，共同成長。分享我們的價值觀和對永續飲食的承諾，並尋找更多合作的可能性。

            尊重農民的辛勤工作，並讓我們的顧客能夠品嚐到最好的蔬果。不僅為我們帶來新鮮美味的食材，更加強了我們對於永續飲食的信念。我們希望通過這樣的合作，讓更多人關注食物的來源，支持小農，並為地球的可持續發展出一份力量。</h3>
            </div>
        </div>
        <div class="about_order">
        <div class="about_orderpic" v-for="item in index_order" :key="item.title">
        <div class="about_order_illustrate">
            <h2>{{ item.title }}</h2>
        </div>    

        <div class="index_order_pic">
            <img :src="item.image" alt="">
        </div>
    </div>
</div>
    

    </div>
</template>
<script>
export default {
            data() {
                return {
                    index_order: [
        {
          title: '瀏覽菜色列表',
          image: require('../assets/images/about/about_step1.svg'),
        },
        {
          title: '選擇您喜愛的食材',
          image: require('../assets/images/about/about_step2.svg'),
        },
        {
          title: '加入購物車',
          image: require('../assets/images/about/about_step3.svg'),
        },
        {
          title: '結帳與支付',
          image: require('../assets/images/about/about_step4.svg'),
        },
        {
          title: '詢問及配送',
          image: require('../assets/images/about/about_step5.svg'),
        },
      ],
                }
            },
            methods: {}
}
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/about.scss";
</style>