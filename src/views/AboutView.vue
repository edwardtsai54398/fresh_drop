<template>
  <div class="about_us">
    <div class="about_us_content">
      <div class="about_us_pic">
        <img src="../assets/images/about/about.png" alt="">
      </div>
      <div class="about_us_text">
        <h3>品牌故事</h3>
        <p>以產地到餐桌的理念為出發點，致力於為您帶來新鮮、健康的蔬食體驗！追求最高品質的蔬食，了解食物的來源和製作過程能夠讓您更加放心和享受美食，，我們與當地的有機農場和食材供應商緊密合作，從種植到收穫，從採購到烹飪，將每一個環節都透明化，以確保食材新鮮、無農藥且營養豐富。<br><br>

          在鮮食空投箱蔬食店，注重環境的保護和可持續性。我們使用環保包裝材料，減少廢棄物的產生，並鼓勵顧客參與回收和循環利用的運動。我們相信，通過選擇蔬食，我們能夠為地球的可持續發展出一份力量。</p>
      </div>
    </div>
    <div class="about_farmer">
      <div class="farmer_pic">
        <img src="../assets/images/about/about_framer.png" alt="">
      </div>
      <div class="about_farmer_future">
        <h3>共植未來：小農攜手耕耘</h3>
        <p>了解每一個食材的種植過程和背後的故事，深入了解他們所使用的種植方法、農藥的使用情況以及土地的管理方式，確保所使用的食材符合我們的高品質標準。
          與小農合作，是一個合作夥伴關係。我們互相支持，共同成長。分享我們的價值觀和對永續飲食的承諾，並尋找更多合作的可能性。<br><br>

          尊重農民的辛勤工作，並讓我們的顧客能夠品嚐到最好的蔬果。不僅為我們帶來新鮮美味的食材，更加強了我們對於永續飲食的信念。我們希望通過這樣的合作，讓更多人關注食物的來源，支持小農，並為地球的可持續發展出一份力量。</p>
        <div class="index_btn_l">小農介紹</div>
      </div>
    </div>

    <div class="about_order">
    <h3>訂購流程</h3>
    <div class="about_order_content">
      <div class="about_order_pic">
        <div
          class="about_orderpic"
          v-for="(item, index) in index_order"
          :key="index"
          :class="{ 'even': index % 2 === 0, 'odd': index % 2 !== 0 }"
        >
        <div class="index_order_pic">
        <img :src="item.image" alt="">
      </div>
        </div>
      </div>
    </div>
  </div>

    <div class="about_ask">
      <div class="about_ask_content">
        <h3>歡迎提供您的寶貴意見！</h3>
      </div>
      <form action="about_asks" class="form-container">
        <div class="name">
          <input v-for="field in nameFields" :key="field.id" :type="field.type" :placeholder="field.placeholder">
        </div>
        <div class="email">
          <input v-for="field in emailFields" :key="field.id" :type="field.type" :placeholder="field.placeholder">
        </div>
        <div class="order">
          <input v-for="field in orderFields" :key="field.id" :type="field.type" :placeholder="field.placeholder">
        </div>
        <div class="note">
          <textarea name="" placeholder="提供意見"></textarea>
        </div>
        <div class="index_btn_l">送出</div>
      </form>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      index_order: [
        {
          image: require('../assets/images/about/step1.png'),
        },
        {
          image: require('../assets/images/about/step2.png'),     
        },
        {
          image: require('../assets/images/about/step3.png'),
        },
        {
          image: require('../assets/images/about/step4.png'),
        },
        {
          image: require('../assets/images/about/step5.png'),
        },
      ],
      nameFields: [
        { id: 1, type: 'text', placeholder: '姓*' },
        { id: 2, type: 'text', placeholder: '名*' }
      ],
      emailFields: [
        { id: 3, type: 'text', placeholder: '信箱*' },
        { id: 4, type: 'text', placeholder: '電話' }
      ],
      orderFields: [
        { id: 5, type: 'text', placeholder: '訂單編號' }
      ]
    };
  },
};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/about.scss";
</style>
