<template>
    <section class="member_gift" ref="mGift" :style="{ top: `${top}px`, width: `${width}px` }">
        <div class="title">
            <h5>禮物卡查詢</h5>
            <SelectComponent :customOptions="options" :placeholder="'狀態'" />
        </div>
        <ul class="gift_history">
            <li class="gift_card" v-for="(gift, index) in giftcard" :key="gift.g_no">
                <div class="pic">
                    <!-- 開發用 -->
                    <img :src="require(`@/assets/images/gift/${gift.g_pic}`)" alt="" />
                </div>
                <div class="info">
                    <p v-if="gift.g_no == 0">狀態：使用完畢</p>
                    <p v-else-if="gift.g_no > 0">狀態：可使用</p>
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
            this.$emit("open", this.giftHistory[i]);
            console.log(this.giftHistory[i]);
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
