<template>
    <MainHeader @toggle="checkMemberStatus" :centerOpen="toggleMemeberCenter" />
    <loginModal :isopen="isLoginOpen" @close="isLoginOpen = false" />

    <main><router-view /></main>

    <MainFooter></MainFooter>
</template>
<script>
import MainHeader from "@/components/MainHeader.vue";
import MainFooter from "@/components/MainFooter.vue";
import loginModal from "@/components/loginModal.vue";

export default {
    name: "HomeView",
    components: {
        MainHeader,
        MainFooter,
        loginModal,
    },

    data() {
        return {
            isLoginOpen: false,
            toggleMemeberCenter: false,
        };
    },
    methods: {
        checkMemberStatus() {
            if (this.$store.state.isLogin) {
                this.toggleMemeberCenter = !this.toggleMemeberCenter;
            } else {
                this.isLoginOpen = true;
            }
        },
        signupOpen() {
            this.isLoginOpen = false
            this.isSignupOpen = true
        },
    },
};
</script>


<style lang="scss">
@import "@/assets/scss/all.scss";

main {
    // padding-top: calc($mobile-head + 10px);
    padding-top: 126px;
    padding-bottom: $sp7;
}
</style>
