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
      created() {
        window.addEventListener('resize', this.cardLayout)
      },
      mounted() {
        this.cardLayout()
      },
      methods: {
        SentDetailToModal(data) {
          this.isGiftModalOpen = true
          this.giftDetail = data
          console.log(data);
        },
        cardLayout() {
          // const mInfo = document.querySelector('.member_info')
          // const mShop = document.querySelector('.member_history')
          // const mGift = document.querySelector('.member_gift')
          // const mShare = document.querySelector('.member_share')
          
        }
      },
    }
</script>

<style lang="scss">
    @import "@/assets/scss/all.scss";
    .member_container > section{
      padding: $sp4 $sp2;
      min-width: 360px;
      max-width: 400px;
      margin-left: auto;
      margin-right: auto;
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
    @include pad-H{
      .member_container{
        max-width: 1000px;
        position: relative;
        &>section{
          position: absolute;
        }
      }
    }
</style>