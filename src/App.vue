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
            isModalOpen: false,
        };
    },
};
</script>


<style lang="scss">
@import "@/assets/scss/all.scss";

main {
    // padding-top: calc($mobile-head + 10px);
    padding-top: 100px;
    padding-bottom: $sp7;
}
</style>
