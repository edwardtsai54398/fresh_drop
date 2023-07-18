<template>
  <section class="member_history">
    <div class="title">
      <h5>購買紀錄</h5>
      <div class="search_group">
        <div class="select_group">
          <SelectComponent :customOptions="yearOptions" :placeholder="2023"/>

          <SelectComponent :customOptions="monthOptions" :placeholder="7"/>
            
          <SelectComponent :customOptions="dayOptions" :placeholder="29"/>

        </div>
        <input type="text" class="search_bar " 
        placeholder="請輸入訂單編號或商品名稱">
        <div class="btn_xs btn_flat search_btn">查詢</div>
      </div>
    </div>
    <ul class="order_history">
      <li class="order collapse" v-for="(order, ordIndex) in orderHistory" 
      :key="order.ordNum">
        <div class="order_info">
          <p>訂購日期：{{ order.date }}</p>
          <p>訂單金額：${{ order.money }}</p>
          <p v-if="order.status == 0">狀態：運送中</p>
          <p v-else-if="order.status == 1">狀態：已送達</p>
          <p>訂單編號：{{ order.ordNum }}</p>
        </div>
        <ul class="order_list">
          <li class="shop_item" v-for="item in order.content" :key="item.name">
            <div class="pic"><img :src="item.img" :alt="item.name"></div>
            <div class="category">{{ item.category }}</div>
            <div class="name">{{ item.name }}</div>
            <div class="amount">X{{ item.amount }}</div>
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
    import SelectComponent from '@/components/SelectComponent.vue'
    import orderHistory from '@/assets/data/orderHistory.js'
    
    export default {
      name: 'MbrShophistory',
      components: {
        SelectComponent,
      },
      data() {
        return {
          yearOptions: [2020,2021,2022,2023],
          monthOptions: [1,2,3,4,5,6,7,8,9,10,11,12],
          dayOptions: [1,2,3,4,5,6,7,8,9,10,11,12],
          orderHistory,
        };
      },
      methods: {
        shoplistToggle(i) {
          const orderDOM = document.querySelectorAll('.order')
          orderDOM[i].classList.toggle('collapse')

        }
      },
    }
</script>

<style lang="scss">
    @import "@/assets/scss/all.scss";
    @import "@/assets/scss/page/member/mbrShophistory.scss";
</style>