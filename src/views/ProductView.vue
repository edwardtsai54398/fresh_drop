<template>
  <main>
    <div class="pro_header">
      <button class="btn_s btn_left">
        <span>back</span>
        <i class="fa-sharp fa-solid fa-arrow-left"></i>
      </button>
      <div style="display: flex; align-items: center; gap: 10px">
        <div class="type">
          <span>主菜</span>
        </div>
        {{ product[0].name }}
      </div>
    </div>
    <div class="pro_info" style="width:70%">
      <div class="pic" style="height:300px">
        <img src="../assets/images/product/10.jpg" alt="product">
      </div>
      <div class="text">
        <p>泰式綠咖哩是一道充滿活力的料理，融合了辣味、椰奶和豐富的蔬菜，每一口都散發出獨特的香料風味，讓你彷彿置身於泰國的街頭小吃攤位。讓這道菜成為你生活中的一部分，帶給你愉悅的味覺體驗！</p>
      </div>

    </div>
  </main>
</template>
<script>
export default {
  data() {
    return {
      product: [
        {
          id: 0,
          name: "泰式綠咖哩",
        },
      ],
    };
  },
  methods: {},
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/product.scss";
</style>
