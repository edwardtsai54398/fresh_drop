<template>
    <section class="member_gift" ref="mGift" :style="{ top: `${top}px` }">
        <div class="title">
            <h5>禮物卡查詢</h5>
            <SelectComponent :customOptions="options" :placeholder="'狀態'" />
        </div>
        <p class="no_data" v-if="giftcard.length == 0">無任何禮物卡紀錄</p>
        <ul class="gift_history" v-if="giftcard.length > 0">
            <li class="gift_card" v-for="(gift, index) in giftcard" :key="gift.g_no">
                <div class="pic">
                    <!-- 開發用 -->
                    <img :src="require(`@/assets/images/gift/${gift.g_pic}`)" alt="" />
                </div>
                <div class="info">
                    <p v-if="gift.remain == 0">狀態：使用完畢</p>
                    <p v-else-if="gift.remain > 0">狀態：可使用</p>
                    <p>禮物卡號碼：{{ parseInt(gift.g_no)+3000 }}</p>
                    <p>剩餘金額：${{ parseInt(gift.remain) }}</p>
                    <p>寄送者：{{ gift.giver }}</p>
                </div>
                <div class="show_more btn_xs btn_flat" @click="sentGiftInfo(index)">查看更多</div>
            </li>
        </ul>
    </section>
</template>

<script>
import SelectComponent from "@/components/SelectComponent.vue";

export default {
    name: "MbrGiftcard",
    components: {
        SelectComponent,
    },
    props: {
        top: Number,
    },
    data() {
        return {
            options: ["可使用", "使用完畢"],
            giftcard: [],
        };
    },
    methods: {
        sentGiftInfo(i) {
            this.$store.commit('sendGiftDetail',this.giftcard[i] )
        },
    },
    watch: {
        "$store.state.memberInfoAll": {
            handler: function (newval) {
                this.giftcard = newval.giftcard;
            },
            deep: true,
        },
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/member/mbrGift.scss";
</style>
