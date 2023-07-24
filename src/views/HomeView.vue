<template>
    <HomeFlipcard />
    <!-- 水果滑動區 -->
    <HomeIngrid />
    <!--  小農輪播區-->
    <HomeFramer />

    <!-- 訂購流程 -->
    <HomeOrder />

    <!-- 訂閱方案 -->
    <HomeSubscribe />
</template>
<script>
import HomeOrder from "./home/HomeOrder.vue";
import HomeFlipcard from "./home/HomeFlipcard.vue";
import HomeFramer from "./home/HomeFramer.vue";
import HomeSubscribe from "./home/HomeSubscribe.vue";
import HomeIngrid from "./home/HomeIngrid.vue";

export default {
    name: "HomeView",
    components: {
        HomeOrder,
        HomeFlipcard,
        HomeFramer,
        HomeSubscribe,
        HomeIngrid,
    },
    data() {
        return {};
    },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
</style> 



