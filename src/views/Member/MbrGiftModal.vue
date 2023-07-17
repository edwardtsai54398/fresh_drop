<template>
    <div class="gift_modal" v-show="isOpen">
      <modalClose @click="$emit('close')"/>
      <div class="pic">
        <img :src="giftDetail.img" alt="">
      </div>
      <div class="info">
        <p v-if="giftDetail.status == 0">狀態：使用完畢</p>
        <p v-else-if="giftDetail.status == 1">狀態：可使用</p>
        <p>禮物卡編號：{{giftDetail.num}}</p>
        <p>剩餘金額：${{giftDetail.remain}}</p>
        <p>面額：${{giftDetail.money}}</p>
        <p>購買日期：{{giftDetail.buyDate}}</p>
      </div>
    </div>
</template>

<script>
    import modalClose from '@/components/modalClose.vue'
    
    export default {
    name: 'MbrGiftModal',
    components: {
      modalClose,
    },
    props: {
        isOpen: Boolean,
        giftDetail: Object
    },
    data() {
        return {
          
        }
    },
    methods: {},
}
</script>

<style lang="scss" scoped>
    @import "@/assets/scss/all.scss";
    @import "@/assets/scss/page/member/giftModal.scss";
    
</style>