<template>
  <div class="about_us">
      <div class="about_us_content">
      <div v-for="(story, index) in brandStories" :key="index" class="about_us_item">
        <div class="about_us_pic">
          <img :src="story.image" alt="">
          {{ story.img }}
        </div>
        <div class="about_us_text">
          <h3>{{ story.title }}</h3>
          <p>{{ story.description }}</p>
        </div>
      </div>
    </div>

      <div class="about_farmer" v-for="(farmer, index) in farmers" :key="index">
      <div class="farmer_pic">
        <img :src="farmer.image" alt="">
      </div>
      <div class="about_farmer_future">
        <h3>{{ farmer.title }}</h3>
        <p>{{ farmer.description }}</p>
        <div class="index_btn_l">
          <router-link to="/Source">小農介紹</router-link>
        </div>
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
  <!-- Hover 效果 -->
    <div class="index_qa">
      <div class="index_hedgehog">
        <img src="../assets/images/index/index_qa.png" alt="">
      </div> 
      <div class="index_door">
        <img src="../assets/images/index/qa_door.png" alt="">
      </div> 
  </div>
</template>


<script>
export default {
            data() {
                return {
        brandStories: [
        {
          title: '品牌故事',
          description: '了解每一個食材的種植過程和背後的故事，深入了解他們所使用的種植方法、農藥的使用情況以及土地的管理方式，確保所使用的食材符合我們的高品質標準。與小農合作，是一個合作夥伴關係。我們互相支持，共同成長。分享我們的價值觀和對永續飲食的承諾，並尋找更多合作的可能性。\n\n尊重農民的辛勤工作，並讓我們的顧客能夠品嚐到最好的蔬果。不僅為我們帶來新鮮美味的食材，更加強了我們對於永續飲食的信念。我們希望通過這樣的合作，讓更多人關注食物的來源，支持小農，並為地球的可持續發展出一份力量。',
          image: require('../assets/images/about/about.png')
        }
      ],
      farmers: [
        {
          title: '共植未來：小農攜手耕耘',
          description: '了解每一個食材的種植過程和背後的故事，深入了解他們所使用的種植方法、農藥的使用情況以及土地的管理方式，確保所使用的食材符合我們的高品質標準。與小農合作，是一個合作夥伴關係。我們互相支持，共同成長。分享我們的價值觀和對永續飲食的承諾，並尋找更多合作的可能性。\n\n尊重農民的辛勤工作，並讓我們的顧客能夠品嚐到最好的蔬果。不僅為我們帶來新鮮美味的食材，更加強了我們對於永續飲食的信念。我們希望通過這樣的合作，讓更多人關注食物的來源，支持小農，並為地球的可持續發展出一份力量。',
          image: require('../assets/images/about/about_framer.png'),
        }
      ],
                    
        index_order: [
        {
          image: require('../assets/images/about/index_step1.png'),
        },
        {
          image: require('../assets/images/about/index_step2.png'),     
        },
        {
          image: require('../assets/images/about/index_step3.png'),
        },
        {
          image: require('../assets/images/about/index_step4.png'),
        },
        {
          image: require('../assets/images/about/index_step5.png'),
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
