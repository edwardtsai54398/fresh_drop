<template>
    <section class="member_info" ref="mInfo" :style="{ top: `${top}px`, width: `${width}px` }">
        <div class="title">
            <h5>個人資料</h5>
            <button class="btn_xs btn_flat edit_store" :class="{show:canEditInfo}" @click.prevent="canEditInfo = false">儲存</button>
            <button class="btn_icon btn_flat info_edit_btn" :class="{unclickable:canEditInfo}" @click.prevent="canEditInfo=true">
                <font-awesome-icon icon="fa-solid fa-pen" />
            </button>
        </div>
        <div class="info">
            <p class="info_item">會員編號：{{ memberInfo.id }}</p>
            <p class="info_item">
                <label for="mem-phone">手機：</label>
                <input :class="{ noedit: !canEditInfo }" type="text" id="phone" v-model="memberInfo.phone" :disabled="!canEditInfo" />
            </p>
            <p class="info_item">
                <label for="mem-email">信箱：</label>
                <input :class="{ noedit: !canEditInfo }" type="text" id="email" v-model="memberInfo.email" :disabled="!canEditInfo" />
            </p>
            <p class="info_item">生日：{{ memberInfo.birth }}</p>
            <p class="info_item">禮物卡餘額：${{ memberInfo.voucherRemain }}</p>
            <p class="info_item address_info_item">
                <label for="mem-address">商品寄送地址：</label>
                <input :class="{ noedit: !canEditInfo }" type="text" id="address" v-model="memberInfo.address" v-show="canEditInfo"/>
                <span v-show="!canEditInfo">{{ memberInfo.address }}</span>
            </p>
        </div>
        <button class="btn_xs btn_flat change_psw">修改密碼</button>
    </section>
</template>

<script>
// import ArrowBtn from '@/components/ArrowBtn.vue'

export default {
    name: "MbtInfo",
    props: {
        top: Number,
        width: Number,
    },
    data() {
        return {
            canEditInfo: false,
            memberInfo: {
                id: 12348765,
                phone: "0952-099091",
                email: "freshdrop@gmail.com",
                birth: "83-5-24",
                voucherRemain: "800",
                address: "桃園市中壢區復興路86號8樓",
            },
        };
    },
    methods: {
        
    },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/member/mbrInfo.scss";
</style>
