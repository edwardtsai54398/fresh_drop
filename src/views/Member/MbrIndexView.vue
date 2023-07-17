<template>
    <div class="member_container">
      <MbrInfo />
      <MbrShophistory />
      <MbrGiftcard @open="SentDetailToModal"/>
      <MbrGiftModal :isOpen="isGiftModalOpen" 
      :giftDetail="giftDetail" @close="isGiftModalOpen = false"/>
      <MbrShare />
    </div>
        
        
</template>

<script>
    import MbrInfo from '@/views/Member/MbrInfo.vue'
    import MbrShophistory from '@/views/Member/MbrShophistory.vue'
    import MbrGiftcard from '@/views/Member/MbrGiftcard.vue'
    import MbrShare from '@/views/Member/MbrShare.vue'
    import MbrGiftModal from '@/views/Member/MbrGiftModal.vue'
    
    export default {
      name: 'MbrIndexView',
      components: {
    MbrInfo,
    MbrShophistory,
    MbrGiftcard,
    MbrShare,
    MbrGiftModal
      },
      data() {
        return {
          isGiftModalOpen: false,
          giftDetail: {},
        };
      },
      methods: {
        SentDetailToModal(data) {
          this.isGiftModalOpen = true
          this.giftDetail = data
          console.log(data);
        }
      },
    }
</script>

<style lang="scss">
    @import "@/assets/scss/all.scss";
    .member_container > section{
      padding: $sp4 $sp2;
      margin-left: $sp2;
      margin-right: $sp2;
      box-shadow: 5px 8px 10px 0px rgba(0, 0, 0, 0.25);
      border-radius: $m-br;
      margin-top: $sp3;
      background-color: #fff;
      & >.title{
        border-bottom: 2px solid $text;
        padding: 0 $sp1 $sp3;
        h5{
          font-size: $m-font;
        color: $primary;
        font-weight: 700;
        }
      }
    }
</style>