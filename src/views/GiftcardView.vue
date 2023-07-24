<template>
    <div class="container giftcard_container">
        <!-- banner -->
        <div class="giftcard_banner pic">
            <!-- Mobile Banner圖片 *待處理: 圖片右邊有一點點白邊，要從Figma上重新抓下來-->
            <img id="banner_mobile" src="../assets/images/gift/banner_mobile.png" alt="banner">
            <!-- 768以上banner -->
            <img id="banner_desktop" src="../assets/images/gift/banner.svg" alt="banner">
            <!-- banner上的標題及文字 -->
            <div class="giftcard_title">
                <h3>{{ banner.title }}</h3>
                <p v-html="banner.text"></p>
            </div>
        </div>

        <!-- 購買&查詢禮物卡區塊 -->
        <div class="giftcardSection">
            <div class="sectionWrap" v-for="(item, index) in giftcardSection" :key="index">
                <div class="giftcard_title">
                    <img :src="item.icon" :alt="item.icon">
                    <span>{{ item.title }}</span>
                </div>
                <div class="buyGiftcard_text">
                    <p>{{ item.text }}</p>
                    <!-- 手機板按鈕 -->
                    <button class="btn_arrow btn_s" id="giftcard_button_mobile"><router-link :to="item.link" style="color:#fff">{{ item.btn }}
                        </router-link></button>
                    <!-- 768以上按鈕 (有箭頭)-->
                    <button id="giftcard_button_desktop" class="btn_arrow" href="" :class="{ 'btn_flat': isFlat, [`btn_${s}`]: true }" @mouseover="hover"
                        @mouseleave="mousLeave"><router-link :to="item.link" style="color:#fff">
                        {{ item.btn }}
                        <img src="@/assets/images/icon_bg/arrow_long_prim.svg" alt="" v-if="isBgcFFF">
                        <img src="@/assets/images/icon_bg/arrow_long_fff.svg" alt="" v-if="!isBgcFFF"></router-link>
                    </button>

                </div>
            </div>

            <!-- 背景圖片裝飾 -->
            <div class="bgcShape_bottom pic">
                <img :src="bgcShape.pink" :alt="bgcShape">
            </div>
        </div>
        <div class="bgcShape_middle pic">
            <img :src="bgcShape.yellow" :alt="bgcShape">
        </div>
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
                icon: require('@/assets/images/icon_bg/footer_icon_giftcard.svg'),
                title: '購買禮物卡',
                text: '常煩惱送禮不知道要送什麼嗎？您可親手製作獨一無二的禮物卡圖面，禮物卡是您最好的選擇。數種食譜讓對方盡情挑選，快速存入帳戶，購物超輕鬆！',
                btn: '購買',
                link: '/giftcardProgress'
            },
            {
                icon: require('@/assets/images/icon_bg/wallet.svg'),
                title: '餘額查詢',
                text: '已經有禮物卡？請登入您的會員帳號，至會員中心查詢您的禮物卡餘額、使用狀況。',
                btn: '會員中心',
                link: '#'
            }
            ],
            bgcShape: {
                yellow: require('@/assets/images/icon_bg/bg_wholeyellow.svg'),
                pink: require('@/assets/images/icon_bg/bg_redOval.svg')
            }
        }
    },
    methods: {},
    // component:{ArrowBtn}
}
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/giftcard.scss";
</style>