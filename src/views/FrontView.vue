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
        checkMemberStatus(val) {
            if (this.$store.state.isLogin) {
                this.toggleMemeberCenter = !this.toggleMemeberCenter;
            } else if (val == '登出') {
                return
            } else {
                this.isLoginOpen = true;
            }
        },
        signupOpen() {
            this.isLoginOpen = false;
            this.isSignupOpen = true;
        },
        checkLogin() {
            let cusNo = sessionStorage.getItem("cus_no");
            if (cusNo) {
                let url = `${this.$url}sessionLogin.php`;
                let params = new URLSearchParams();
                params.append("cusNo", cusNo);
                this.axios.post(url, params).then((res) => {
                    this.$store.commit("setUserData", res.data);
                });
            } else {
                this.$store.commit('logOut');
            }
        },
    },
    mounted() {
        this.checkLogin();
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
