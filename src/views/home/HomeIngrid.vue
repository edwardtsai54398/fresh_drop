<template>
  <!-- 水果滑動區 -->
  <section class="index_health_banner">
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
</template>
<script>

export default{
  name: 'HomeView',
  components: {
   
  },
  data() {
    return {
      
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
@import "@/assets/scss/page/home/homeIngrid.scss";
</style>