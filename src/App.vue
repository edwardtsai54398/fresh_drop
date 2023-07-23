<template>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <MainHeader @toggle="isModalOpen = !isModalOpen"></MainHeader>
    <loginModal :isopen="isModalOpen" @close="isModalOpen = false"></loginModal>
    <MainHeader @toggle="checkMemberStatus" :centerOpen="toggleMemeberCenter" />
    <loginModal :isopen="isLoginOpen" @close="isLoginOpen = false" />
    <!-- <SignupModal :isopen="isSignupOpen" @close="isSignupOpen = false" /> -->

    <main><router-view /></main>

    <MainFooter></MainFooter>
</template>
<script>
import MainHeader from "@/components/MainHeader.vue";
import MainFooter from "@/components/MainFooter.vue";
import loginModal from "@/components/loginModal.vue";
// import SignupModal from "@/components/SignupModal.vue";

export default {
    name: "HomeView",
    components: {
        MainHeader,
        MainFooter,
        loginModal,
        // SignupModal,
    },

    data() {
        return {
            isLoginOpen: false,
            isSignupOpen: false,
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
