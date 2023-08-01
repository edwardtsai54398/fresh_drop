<template>
    <div style="width:100%; overflow: hidden; position: relative;">
        <div class="member_container" ref="mCONTAIN" :style="{paddingTop:`${containH}px`}"><!---->
          <MbrInfo ref="mINFO" :top="0"/>
          <MbrShophistory ref="mSHOP" :top="0" @toggle="cardLayout"/>
          <MbrGiftcard @open="SentDetailToModal" ref="mGIFT" :top="rowGap+infoH"/> <!---->
          <MbrGiftModal :isOpen="isGiftModalOpen"
          :giftDetail="giftDetail" @close="isGiftModalOpen = false"/>
          <MbrShare ref="mSHARE" :top="rowGap+shopH"/><!---->
          <p class="bgc_slogan">Explore the Joy of Cooking, Embrace Harmony with Nature</p>
          <img src="@/assets/images/icon_bg/bg_lightgreen.svg" alt="" class="green_blob">
          <img src="@/assets/images/icon_bg/bg_pink.svg" alt="" class="red_blob">
          <img src="@/assets/images/icon_bg/bg_yelloIrregularShape.svg" alt="" class="yellow_blob">
          <img src="@/assets/images/index/index_decorate_vg2.png" alt="" class="onion">
          <img src="@/assets/images/index/index_decorate_vg6.png" alt="" class="corn">
          <img src="@/assets/images/index/index_decorate_vg3.png" alt="" class="lettuce">
        </div>
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
          // colGap: 24,
          rowGap: 32,
          infoH:0,
          shopH:0,
          giftH:0,
          shareH:0,
          // containH: 0
        };
      },
      created() {
        window.addEventListener('resize', this.cardLayout)
      },
      mounted() {
        this.cardLayout()
      },
      computed: {
        
      },
      methods: {
        SentDetailToModal(data) {
          this.isGiftModalOpen = true
          this.giftDetail = data
          console.log(data);
        },
        cardLayout() {
          const winW = window.innerWidth
          const infoCard = this.$refs.mINFO.$refs.mInfo
          const shopCard = this.$refs.mSHOP.$refs.mShop
          const giftCard = this.$refs.mGIFT.$refs.mGift
          const shareCard = this.$refs.mSHARE.$refs.mShare

          if(winW >= 1024){
            this.infoH = infoCard.offsetHeight
            this.shopH = shopCard.offsetHeight
            this.giftH = giftCard.offsetHeight
            this.shareH = shareCard.offsetHeight
          }
          const cardsH =[this.infoH, this.shopH, this.giftH, this.shareH]
          cardsH.sort((a, b) => b - a);
          this.containH = cardsH[0]+cardsH[1]+this.rowGap*2
        }
      },
    }
</script>

<style lang="scss">
    @import "@/assets/scss/all.scss";
    @import "@/assets/scss/page/member/mbrIndex.scss";
    
</style>