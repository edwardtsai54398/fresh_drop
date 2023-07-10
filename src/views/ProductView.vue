<template>
  <section>
    <div class="pro_header">
      <button class="btn_s btn_left">
        <span>back</span>
        <i class="fa-sharp fa-solid fa-arrow-left"></i>
      </button>
      <div class="title">
        <div class="type">
          <span>{{ productList[0].catagory }}</span>
        </div>
        {{ productList[0].name }}
      </div>
    </div>
    <div class="pro_info">
      <div class="pic">
        <img :src="productList[0].img" alt="product">
      </div>
      <div class="text">
        <p>{{ productList[0].present }}</p>
      </div>
    </div>
    <article>
      <div>
        <h2>材料【2人份】</h2>
        <div class="wrap">
          <p class="ingred" v-for="(item, index) in productList[0].ingred" :key="index">{{ item }}</p>
        </div>
      </div>
      <div>
        <h2>步驟</h2>
        <ol class="wrap">
          <li v-for="(step, index) in productList[0].step" :key="index">
            <span class="number">{{ index + 1 }}</span>
            <div class="title_border">
              <p class="title">{{ step.title }}</p>
            </div>
            <ul>
              <li v-for="(subStep, subIndex) in step.step" :key="subIndex">
                <p class="info">{{ subStep }}</p>
              </li>
            </ul>
          </li>
        </ol>
      </div>
      <div>
        <h2>過敏原</h2>
        <div class="wrap">
          <p class="allergy" v-for="(item, index) in productList[0].allergy" :key="index">{{ item }}</p>
        </div>
      </div>
    </article>
  </section>
</template>

<script>
import productList from "@/assets/data/productList.js";
export default {
  data() {
    return {
      productList,
    };
  },
  methods: {},
};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/product.scss";
</style>
