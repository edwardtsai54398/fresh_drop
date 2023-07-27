<template>
    <div class="mask" :class="{ none: !isopen }" @click="$emit('close')"></div>
    <div class="forget_container" :class="{ open: isopen }">
        <modalClose @click="$emit('close')" />
        <!-- <router-view> -->
        <div class="forget_normal">
            <h4>忘記密碼</h4>
            <div class="text_wrap">
                <label for="email">Email</label>
                <input type="email" placeholder="請輸入信箱" v-model="user.email" id="email" />
            </div>

            <div class="confirm_btn"><a class="btn_s" @click="confirm">發送驗證信</a></div>
        </div>

        <!-- </router-view> -->
    </div>
</template>
<script>
import modalClose from "@/components/modalClose.vue";

export default {
    name: "SignupModal",
    props: {
        isopen: Boolean,
    },
    components: {
        modalClose,
    },
    data() {
        return {
            user: {
                email: "",
            },

        };
    },
    methods: {

    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/forget.scss";
// @import "@/assets/scss/page/signup.scss";
</style>