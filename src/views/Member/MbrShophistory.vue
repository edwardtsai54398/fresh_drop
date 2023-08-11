<template>
    <section class="member_history" ref="mShop" :style="{ top: `${top}px` }">
        <div class="title">
            <h5>購買紀錄</h5>
            <div class="search_group" v-if="orderHistory.length > 0">
                <div class="select_group">
                    <SelectComponent :customOptions="yearOptions" :placeholder="2023" />

                    <SelectComponent :customOptions="monthOptions" :placeholder="7" />

                    <SelectComponent :customOptions="dayOptions" :placeholder="29" />
                </div>
                <input type="text" class="search_bar" placeholder="請輸入訂單編號或商品名稱" />
                <div class="btn_xs btn_flat search_btn">查詢</div>
            </div>
        </div>
        <p class="no_data" v-if="orderHistory.length == 0">無任何購買紀錄</p>
        <ul class="order_history" v-if="orderHistory.length > 0">
            <li class="order_item collapse" v-for="(order, ordIndex) in orderHistory" :key="order.ordNum">
                <div class="order_info">
                    <p>訂單編號：{{ parseInt(order.ord_no)+2000 }}</p>
                    <p>訂購日期：{{ order.ord_date }}</p>
                    <p>訂單金額：${{ order.price }}</p>
                    <p v-if="order.ord_status == 1">狀態：處理中</p>
                    <p v-else-if="order.ord_status == 2">狀態：配送中</p>
                    <p v-else-if="order.ord_status == 3">狀態：已送達</p>
                    <p v-else-if="order.ord_status == 4">狀態：已取消</p>
                    <p>收件人：{{ order.ord_cus }}</p>
                    <p>地址：{{ order.ord_addr }}</p>
                </div>
                <ul class="order_list">
                    <li class="shop_item" v-for="item in order.content" :key="item.recipe_name">
                        <div class="pic"><img :src="require(`@/assets/images/product/${item.recipe_pic}`)" :alt="item.recipe_name" /></div>
                        <div class="category" v-if="item.class == 0">主菜</div>
                        <div class="category" v-else-if="item.class == 1">湯品</div>
                        <div class="category" v-else-if="item.class == 2">沙拉</div>
                        <div class="name">{{ item.recipe_name }}</div>
                        <div class="amount">X{{ item.qty }}</div>
                    </li>
                </ul>
                <div class="btn_flat shoplist_toggle" @click="shoplistToggle(ordIndex)">
                    <font-awesome-icon icon="fa-solid fa-chevron-down" />
                </div>
            </li>
        </ul>
    </section>
</template>

<script>
import SelectComponent from "@/components/SelectComponent.vue";
// import orderHistory from "@/assets/data/orderHistory.js";

export default {
    name: "MbrShophistory",
    components: {
        SelectComponent,
    },
    props: {
        top: Number,
    },
    data() {
        return {
            yearOptions: [2020, 2021, 2022, 2023],
            monthOptions: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            dayOptions: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            orderHistory:[],
        };
    },
    methods: {
        shoplistToggle(i) {
            const orderDOM = document.querySelectorAll(".order_item");
            orderDOM[i].classList.toggle("collapse");
            this.$emit("toggle");
        },
    },
    watch: {
        "$store.state.memberInfoAll": {
            handler: function (newval) {
                this.orderHistory = newval.shop;
            },
            deep: true,
        },
        // "$el.clientHeight": {
        //     handler: function (newval) {
        //         console.log(newval);
        //     },
        //     deep:true,
        // }
    },
    
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/member/mbrShophistory.scss";
</style>
