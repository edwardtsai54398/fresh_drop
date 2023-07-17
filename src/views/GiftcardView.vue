<template>
    <div class="container giftcard_container">
        <div class="giftcard_banner pic">
            <!-- 待處理: banner 圖片右邊有一點點白邊，要從Figma上重新抓下來-->
            <img src="../assets/images/gift/banner_mobile.png" alt="banner">
            <div class="giftcard_title">
                <h3>{{ banner.title }}</h3>
                <p v-html="banner.text"></p>
            </div>
        </div>
        <div class="giftcardSection" v-for="(item, index) in giftcardSection" :key="index">
            <div class="giftcard_title">
                <!-- 待解決: 圖片return -->
                <img :src="require('../assets/images/icon_bg/wallet.svg')" :alt="item.icon">
                <span>{{ item.title }}</span>
            </div>
            <div class="buyGiftcard_text">
                <p>{{ item.text }}</p>
             
                    <button class="btn_arrow btn_s"><router-link :to="item.link"  style="color:#fff">{{ item.btn }} </router-link></button>
               
            </div>
        </div>
        <!-- <div class="bgcShape_middle">
            <img :src="require('../assets/images/icon_bg/bg_yelloIrregularShape.svg')" :alt="bgcShape"> 
        </div>
        <div class="bgcShape_bottom pic">
            <img :src="require('../assets/images/icon_bg/bg_redOval.svg')" :alt="bgcShape">
        </div> -->


    </div>
</template>
<script>
export default {
    data() {
        return {
            banner: {
                title: '禮物卡',
                text: '最令人安心的禮物<br>送給最重要的人'
            },
            giftcardSection: [{
                icon: '../assets/images/icon_bg/wallet.svg',
                title: '購買禮物卡',
                text: '常煩惱送禮不知道要送什麼嗎？您可親手製作獨一無二的禮物卡圖面，禮物卡是您最好的選擇。數種食譜讓對方盡情挑選，快速存入帳戶，購物超輕鬆！',
                btn: '購買',
                link: '/giftcardProgress'
            },
            {
                icon: '../assets/images/icon_bg/wallet.svg',
                title: '餘額查詢',
                text: '已經有禮物卡？請登入您的會員帳號，至會員中心查詢您的禮物卡餘額、使用狀況。',
                btn: '會員中心',
                link:'#'
            }
            ],
            bgcShape:{
                yellow:'../assets/images/icon_bg/bg_yelloIrregularShape.svg'
            }
        }
    },
    methods: {}
}
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/giftcard.scss";
</style>