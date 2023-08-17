<template>
    <section class="member_share" ref="mShare" :style="{ top: `${top}px`}">
        <div class="title">
            <h5>烹飪心得</h5>
            <SelectComponent :customOptions="selectOptions" :placeholder="'日期排序'" />
        </div>
        <p class="no_data" v-if="memberShare.length == 0">無任何食譜分享紀錄</p>
        <ul class="share_list" v-if="memberShare.length > 0">
            <li class="share_item" v-for="(share, index) in memberShare" :key="share.opinion_no">
                <div class="pic">
                    <img :src="require(`@/assets/images/product/${share.share_pic}`)" alt="" />
                </div>
                <div class="share_title_wrap">
                    <h6 class="name">{{ share.share_dishname }}</h6>
                    <div class="date">{{ share.share_time }}</div>
                </div>
                <div class="content">
                    <input type="text" v-model="share.share_txt" />
                    <p>{{ shareEllipsis(share.share_txt) }}</p>
                    <button class="btn_icon btn_flat edit_massage" @click.prevent="canEditThisShare(index)">
                        <font-awesome-icon icon="fa-solid fa-pen" />
                        <font-awesome-icon icon="fa-solid fa-floppy-disk" />
                    </button>
                </div>
            </li>
        </ul>
    </section>
</template>

<script>
import SelectComponent from "@/components/SelectComponent.vue";
// import memberShare from "@/assets/data/memberShare.js";

export default {
    name: "MbrShare",
    components: {
        SelectComponent,
    },
    props: {
        top: Number,
    },
    data() {
        return {
            selectOptions: ["最新", "最舊"],
            memberShare:[],
        };
    },
    created() { },
    updated() {
        this.$emit('toggle')
    },
    computed: {},
    methods: {
        shareEllipsis(msg) {
            let winW = window.innerWidth;
            let strLenStrict = 0;
            if (winW < 1024) {
                strLenStrict = 9;
            } else if (winW >= 1024 && winW < 1200) {
                strLenStrict = 14;
            } else if (winW >= 1200) {
                strLenStrict = 18;
            }
            let newStr = msg
            if (msg.length > strLenStrict) {
                newStr = msg.substr(0, strLenStrict);
                newStr += "...";
            }

            return newStr;
        },
        canEditThisShare(i) {
            const shareDOMS = document.querySelectorAll(".share_item .content");
            shareDOMS[i].classList.toggle("can_edit");
        },
    },
    watch: {
        "$store.state.memberInfoAll": {
            handler: function (newval) {
                this.memberShare = newval.share;
            },
            deep: true,
        },
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/member/mbrShare.scss";
</style>
