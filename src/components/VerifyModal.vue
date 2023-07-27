<template>
    <div class="mask" :class="{ none: !isopen }" @click="$emit('close')"></div>
    <div class="verify_container" :class="{ open: isopen }">
        <modalClose @click="$emit('close')" />
        <!-- <router-view> -->
        <div class="verify_normal">
            <h4>忘記密碼</h4>
            <div class="text_wrap">
                <label for="number">輸入驗證信中的驗證碼</label>
                <input type="number" placeholder="請輸入驗證碼" v-model="user.number" id="number" />
            </div>

            <div class="submit_btn"><a class="btn_s" @click="submit">送出</a></div>
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
                number: "",
            },

        };
    },
    methods: {

    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/verify.scss";
// @import "@/assets/scss/page/signup.scss";
</style>