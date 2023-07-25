<template>
    <!-- banner滑卡區 -->
    <HomeFlipcard></HomeFlipcard>

    <!-- 水果滑動區 -->
    <HomeIngrid></HomeIngrid>
    <!--  小農輪播區-->
    <HomeFramer></HomeFramer>

    <!-- 訂購流程 -->
    <HomeOrder></HomeOrder>
    <!-- 訂閱方案 -->
    <HomeSubscription></HomeSubscription>
</template>
<script>
import HomeIngrid from './home/HomeIngrid.vue';
import HomeFlipcard from './home/HomeFlipcard.vue';
import HomeFramer from './home/HomeFramer.vue';
import HomeOrder from './home/HomeOrder.vue';
import HomeSubscription from './home/HomeSubscription.vue';

export default {
    name: 'HomeView',
    components: {
        HomeIngrid,
        HomeSubscription,
        HomeFlipcard,
        HomeFramer,
        HomeOrder,
    },

    data() {
        return {};
    },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
// @import "@/assets/scss/page/home.scss";
</style> 



