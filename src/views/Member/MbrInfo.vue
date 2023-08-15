<template>
    <section class="member_info" ref="mInfo" :style="{ top: `${top}px` }">
        <div class="title">
            <h5>個人資料</h5>
            <button
                class="btn_icon btn_flat info_edit_btn"
                :class="{ can_edit: canEditInfo }"
                @click.prevent="
                    canEditToggle();
                    changeInfo();
                "
            >
                <font-awesome-icon icon="fa-solid fa-pen" />
                <font-awesome-icon icon="fa-solid fa-floppy-disk" />
            </button>
        </div>
        <div class="info">
            <p class="info_item">會員編號：{{ parseInt(memberInfo.cus_no) + 1000 }}</p>
            <p class="info_item">
                <label for="mem-nickname">暱稱：</label>
                <input
                    :class="{ noedit: !canEditInfo }"
                    type="text"
                    id="phone"
                    v-model="memberInfo.cus_acc"
                    :disabled="!canEditInfo"
                />
            </p>
            <p class="info_item">
                <label for="mem-phone">手機：</label>
                <input
                    :class="{ noedit: !canEditInfo }"
                    type="text"
                    id="phone"
                    v-model="memberInfo.phone"
                    :disabled="!canEditInfo"
                />
            </p>
            <p class="info_item">
                <label for="mem-email">信箱：</label>
                <input
                    :class="{ noedit: !canEditInfo }"
                    type="text"
                    id="email"
                    v-model="memberInfo.cus_email"
                    :disabled="!canEditInfo"
                />
            </p>
            <p class="info_item">生日：{{ memberInfo.birth }}</p>
            <p class="info_item">
                <label for="mem-address">商品寄送地址：</label>
                <input
                    :class="{ noedit: !canEditInfo }"
                    type="text"
                    id="address"
                    v-model="memberInfo.address"
                    v-show="canEditInfo"
                />
                <span v-show="!canEditInfo">{{ memberInfo.address }}</span>
            </p>
        </div>
        <button class="btn_xs btn_flat change_psw" @click="openChangePsw">修改密碼</button>
    </section>
</template>

<script>
export default {
    name: "MbrInfo",
    props: {
        top: Number,
    },
    data() {
        return {
            canEditInfo: false,
            memberInfo: {},
        };
    },
    methods: {
        canEditToggle() {
            this.canEditInfo = !this.canEditInfo;
            this.$emit("toggle");
        },
        changeInfo() {
            if (!this.canEditInfo) {
                let cusNo = sessionStorage.getItem("cus_no");
                let url = `${this.$url}changeInfo.php`;
                let params = new URLSearchParams();
                params.append("cusNo", cusNo);
                params.append("acc", this.memberInfo.cus_acc);
                params.append("phone", this.memberInfo.phone);
                params.append("email", this.memberInfo.cus_email);
                params.append("address", this.memberInfo.address);
                this.axios
                    .post(url, params)
            }
        },
        openChangePsw() {
            this.$store.state.pswIsOpen = true;
            this.canEditInfo = false;
        },
    },
    watch: {
        "$store.state.memberInfoAll": {
            handler: function (newval) {
                this.memberInfo = newval.info;
            },
            deep: true,
        },
    },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/member/mbrInfo.scss";
</style>
