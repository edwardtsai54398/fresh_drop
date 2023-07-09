<template>
  <h1>This is an product page</h1>
  <main>
      <div class="pro_header">
        <button class="btn_s btn_left">
          <span>back</span>
          <i class="fa-sharp fa-solid fa-arrow-left"></i>
        </button>
        <div style="display: flex; align-items: center; gap: 10px;">
            <div class="type" >
              <span>主菜</span>
            </div>
            {{product[0].name}}
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
          id:0,
          name: "泰式綠咖哩",
        }
      ],
    };
  },
  methods: {},
};
</script>
<style lang="scss">
@import "@/assets/scss/page/_product.scss";
</style>
