<template>
    <section class="member_gift" ref="mGift" :style="{top:`${top}px`, width:`${width}px`}">
      <div class="title">
        <h5>禮物卡查詢</h5>
        <SelectComponent :customOptions="options" :placeholder="'狀態'"/>
      </div>
      <ul class="gift_history">
        <li class="gift_card" v-for="(gift, index) in  giftHistory" :key="gift.num">
          <div class="pic">
            <img :src="gift.img" alt="">
          </div>
          <div class="info">
            <p v-if="gift.status == 0">狀態：使用完畢</p>
            <p v-else-if="gift.status == 1">狀態：可使用</p>
            <p>可用金額：{{ gift.remain }}</p>
            <p>禮物卡號碼：{{ gift.num }}</p>
          </div>
          <div class="show_more btn_xs btn_flat" @click="sentGiftInfo(index)">查看更多</div>
        </li>
      </ul>
    </section>
</template>

<script>
    import SelectComponent from '@/components/SelectComponent.vue'
    
    export default {
    name: 'MbrGiftcard',
    components: {
      SelectComponent,
    },
    props: {
        top: Number,
        width: Number,
    },
    data() {
        return {
          options: ['可使用','使用完畢'],
          giftHistory: [
            {
              img: require('@/assets/images/gift/giftcard2.png'),
              status: 1,
              num: 12349876,
              remain: 800,
              money:1000,
              buyDate: '2023-06-12',

            },
          ],
        }
    },
    methods: {
      sentGiftInfo(i) {
        this.$emit('open', this.giftHistory[i])
        console.log(this.giftHistory[i]);
      }
    },
}
</script>

<style lang="scss">
    @import "@/assets/scss/all.scss";
    @import "@/assets/scss/page/member/mbrGift.scss";
</style>