<!-- <template>
  <div class="index_health_banner">
    <div class="index_health">
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
</template>

<script>
export default {
  mounted() {
    window.addEventListener('scroll', this.handleScroll1);
  },
  methods: {
    handleScroll1() {
      let scrollY = window.scrollY;
      let box = document.querySelector('.index_health');

      box.style.transform = `translate(-${scrollY}px, ${scrollY}px)`;
    }
  }
};
</script>

<style>
.index_health_banner {
  position: sticky;
  overflow: hidden;
  display: flex;
  top: 0;
  height: 2000px;
}

.index_health {
  height: 100vh;
  position: sticky;
  flex-shrink: 0;
  display: flex;
  top: 0;
  text-align: center;

}

.index_health_pic {
  width: 400px;
  margin: 200px;
}

.index_health_pic img {
  width: 100%;
}
</style>
 -->



 <template>
  <div class="index_health_banner">
    <div class="index_health" ref="box">
      <div class="index_health_pic" v-for="(vegetable, index) in vegetables" :key="index">
        <img :src="vegetable.image" alt="">
        <h3>{{ vegetable.name }}</h3>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vegetables: [
        { name: 'Chinese cabbage', image: require ('../assets/images/index/index_vefetable.png') },
        { name: 'cauliflower',image: require ('../assets/images/index/index_vefetable1.png') },
        { name: 'Green pepper', image: require ('../assets/images/index/index_vefetable2.png') },
        { name: 'onion', image: require ('../assets/images/index/index_vefetable3.png') },
        { name: 'Chinese cabbage', image: require ('../assets/images/index/index_vefetable4.png') },
      ]
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll1);
  },
  methods: {
    handleScroll1() {
      let scrollY = window.scrollY;
      let box = this.$refs.box;

      box.style.transform = `translate(-${scrollY}px, ${scrollY}px)`;
    }
  }
};
</script>

<style>
.index_health_banner {
  position: sticky;
  overflow: hidden;
  display: flex;
  top: 0;
  height: 2000px;
}

.index_health {
  height: 100vh;
  position: sticky;
  flex-shrink: 0;
  margin-top: 200px;
  display: flex;
  top: 0;
  text-align: center;
}

.index_health_pic {
  width: 400px;
  margin: 200px;
}

.index_health_pic img {
  width: 100%;
}
</style>

