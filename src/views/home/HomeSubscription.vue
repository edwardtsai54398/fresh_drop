<template>
  <section class="index_subscription">
    <div class="subscription_wrap">
      <p>｜定期配送｜</p>
      <div class="index_menu">
        <h3>1.一次配送幾餐?</h3>
      </div>
      <div class="drop_wrap">
        <div class="index_8drop">
          <div class="index_drop">
            <h4>8 DROP</h4>
          </div>
          <div class="index_drop_box">
            <div class="index_drop_pic">
              <p class="box_txt"><span>4</span>份</p>
              <img src="@/assets/images/index/imdex_box.png" alt="">
            </div>
            <div class="index_money">
              <h4>原價1600元</h4>
              <div class="sale_text">
                <h4>特價1440元</h4>
              </div>
              <div class="sale_menu_text">
                <h4>(一餐省下20元)</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="index_8drop">
          <div class="index_drop">
            <h4>12 DROP</h4>
          </div>

          <div class="index_drop_box">
            <div class="index_drop_pic">
              <p class="box_txt"><span>6</span>份</p>
              <img src="@/assets/images/index/imdex_box.png" alt="">
            </div>
            <div class="index_money">
              <h4>原價2400元</h4>
              <div class="sale_text">
                <h4>特價1920元</h4>
              </div>
              <div class="aa">
                <h4>(一餐省下40元)</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="index_8drop">
          <div class="index_drop">
            <h4>20 DROP</h4>
          </div>
          <div class="index_drop_box">
            <div class="index_drop_pic">
              <p class="box_txt"><span>10</span>份</p>
              <img src="@/assets/images/index/imdex_box.png" alt="">
            </div>
            <div class="index_money">
              <h4>原價4000元</h4>
              <div class="sale_text">
                <h4>特價3000元</h4>
              </div>
              <div class="aa">
                <h4>(一餐省下50元)</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="index_one">
        <h3>2.隔多久配送一次?</h3>
      </div>
      <div class="index_button">
        <div class="index_button_week">
          <span>2</span>周
        </div>
        <div class="index_button_week">
          <span>3</span>周
        </div>
        <div class="index_button_week">
          <span>4</span>周
        </div>
      </div>
      <div class="index_illustrate">
        <h3>從第二次訂購開始，您可以選擇跳過、暫停或取消訂閱。我們沒有設定任何訂單次數的限制，也沒有與暫停或取消訂閱相關的違約金。</h3>
      </div>
      <router-link to="/shop">
        <div class="index_btn_l_more">更多食譜</div>
      </router-link>
    </div>
  </section>
</template>
<script>


export default {
  data() {
    return {
    };
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/home/homeSubscription.scss";
</style>



