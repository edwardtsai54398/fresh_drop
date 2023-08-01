<template>
    <section class="member_share" ref="mShare" :style="{ top: `${top}px`, width: `${width}px` }">
        <div class="title">
            <h5>烹飪心得</h5>
            <SelectComponent :customOptions="selectOptions" :placeholder="'日期排序'" />
        </div>
        <ul class="share_list">
            <li class="share_item" v-for="(share, index) in memberShare" :key="share.id">
                <div class="pic">
                    <img :src="share.img" alt="" />
                </div>
                <div class="share_title_wrap">
                    <h6 class="name">{{ share.dishname }}</h6>
                    <div class="date">{{ share.date }}</div>
                </div>
                <div class="content">
                    <input type="text" v-model="share.message" />
                    <p>{{ shareEllipsis(share.message) }}</p>
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
import memberShare from "@/assets/data/memberShare.js";

export default {
    name: "MbrShare",
    components: {
        SelectComponent,
    },
    props: {
        top: Number,
        width: Number,
    },
    data() {
        return {
            selectOptions: ["最新", "最舊"],
            memberShare,
        };
    },
    created() {},
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
};
</script>

<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/member/mbrShare.scss";
</style>
