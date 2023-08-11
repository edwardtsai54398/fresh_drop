<template>
    <modalComponent @close="modalClose" :isopen="$store.state.giftModalIsOpen">
    <template v-slot:content>
        <div class="gift_modal" v-if="giftDetail">
            <div class="pic">
                <img :src="`/data_images/gift/${giftDetail.g_pic}`" alt="" />
            </div>
            <div class="info">
                <p v-if="giftDetail.remain == 0">狀態：使用完畢</p>
                <p v-else-if="giftDetail.remain > 0">狀態：可使用</p>
                <p>禮物卡編號：{{ parseInt(giftDetail.g_no) + 3000 }}</p>
                <p>剩餘金額：${{ parseInt(giftDetail.remain) }}</p>
                <p>面額：${{ giftDetail.g_money }}</p>
                <p>購買日期：{{ giftDetail.g_date }}</p>
            </div>
        </div>
    </template>
    </modalComponent>
    
</template>

<script>
// import modalClose from "@/components/modalClose.vue";
import modalComponent from "@/components/modalComponent.vue";


export default {
    name: "MbrGiftModal",
    components: {
        modalComponent,
    },
    
    data() {
        return {
            // isOpen: false,
            giftDetail: null,
        };
    },
    methods: {
        modalClose() {
            this.$store.state.giftModalIsOpen = false;
        },
    },
    created() {
        // this.isOpen = this.$store.state.giftModalIsOpen;
        this.giftDetail = this.$store.state.giftDetail;
    },
    watch: {
        // "$store.state.giftModalIsOpen": {
        //     handler: function (newval) {
        //         this.isOpen = newval;
        //     },
        //     deep: true,
        // },
        "$store.state.giftDetail": {
            handler: function (newval) {
                this.giftDetail = newval;
            },
            deep: true,
        },
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/member/giftModal.scss";
</style>
