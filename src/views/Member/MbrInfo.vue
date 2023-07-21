<template>
    <section class="member_info">
      <div class="title">
        <h5>個人資料</h5>
        <button class="btn_icon btn_flat info_edit_btn">
          
          <font-awesome-icon icon="fa-solid fa-pen" />
        </button>
      </div>
      <div class="info">
        <p class="info_item">會員編號：{{ memberInfo.id }}</p>
        <p class="info_item">
          <label for="phone">手機：</label>
          <input type="text" id="phone" :value="memberInfo.phone" disabled>
        </p>
        <p class="info_item">
          <label for="email">信箱：</label>
          <input type="text" id="email" :value="memberInfo.email" disabled>
        </p>
        <p class="info_item">生日：{{memberInfo.birth}}</p>
        <p class="info_item">禮物卡餘額：${{memberInfo.voucherRemain}}</p>
        <p class="info_item">
          <label for="address">商品寄送地址：</label>
          <input type="text" id="address" :value="memberInfo.address" disabled>
        </p>
      </div>
      <button class="btn_s btn_flat change_psw">修改密碼</button>
    </section>
</template>

<script>
    // import ArrowBtn from '@/components/ArrowBtn.vue'
    
    export default {
      name: 'MbtInfo',
      // components: {
      //   ArrowBtn,
      // },
      data() {
        return {
          memberInfo: {
            id: 12348765,
            phone: '0952-099091',
            email: 'freshdrop@gmail.com',
            birth: '83-5-24',
            voucherRemain: '800',
            address: '桃園市中壢區復興路86號8樓'
          }
        };
      },
      methods: {
        
      },
    }
</script>

<style lang="scss" scoped>
    @import "@/assets/scss/all.scss";
    @import "@/assets/scss/page/member/mbrInfo.scss";
</style>