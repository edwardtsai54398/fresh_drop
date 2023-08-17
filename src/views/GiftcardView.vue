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
            <div class="sectionWrap">
                <div class="giftcard_title">
                    <img src="@/assets/images/icon_bg/footer_icon_giftcard.svg" alt="購買禮物卡">
                    <span>購買禮物卡</span>
                </div>
                <div class="buyGiftcard_text">
                    <p>常煩惱送禮不知道要送什麼嗎？您可親手製作獨一無二的禮物卡圖面，禮物卡是您最好的選擇。數種食譜讓對方盡情挑選，快速存入帳戶，購物超輕鬆！</p>
                    <!-- 手機板按鈕 -->
                    <button class="btn_arrow btn_xs" id="giftcard_button_mobile"><router-link :to="'/giftcardProgress'" style="color:#fff">購買
                        </router-link></button>
                    <!-- 768以上按鈕 (有箭頭)-->
                    <ArrowBtn id="giftcard_button_desktop" :text="'購買'" @click="$router.push('/giftcardProgress')"/>
                </div>
            </div>
            <div class="sectionWrap">
                <div class="giftcard_title">
                    <img src="@/assets/images/icon_bg/footer_icon_giftcard.svg" alt="購買禮物卡">
                    <span>餘額查詢</span>
                </div>
                <div class="buyGiftcard_text">
                    <p>已經有禮物卡？請登入您的會員帳號，至會員中心查詢您的禮物卡餘額、使用狀況。</p>
                    <!-- 手機板按鈕 -->
                    <button class="btn_arrow btn_xs" id="giftcard_button_mobile" @click="goMemeber">會員中心</button>
                    <!-- 768以上按鈕 (有箭頭)-->
                    <ArrowBtn id="giftcard_button_desktop" :text="'會員中心'" @click="goMemeber"/>
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
import ArrowBtn from '@/components/ArrowBtn.vue'
export default {
    components: {
        ArrowBtn,
    },
    data() {
        return {
            banner: {
                title: '禮物卡',
                text: '最令人安心的禮物<br>送給最重要的人'
            },
            bgcShape: {
                yellow: require('@/assets/images/icon_bg/bg_wholeyellow.svg'),
                pink: require('@/assets/images/icon_bg/bg_redOval.svg')
            }
        }
    },
    methods: {
        goMemeber() {
            if (this.$store.state.isLogin) {
                this.$router.push('/member')
            } else {
                alert('請先登入會員')
                this.$store.state.isLoginOpen = true
            }
        },
    },
    
}
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/giftcard.scss";
</style>