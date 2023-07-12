<template>
    <footer class="mainfooter">
        <div class="sitemap">
            <div class="logo pic"><img src="@/assets/images/logo/logo.png" alt=""></div>
            <div class="social_media">
                <div class=" follow">follow us</div>
                <div class="circle"><i class="fa-brands fa-facebook-f"></i></div>
                <div class="circle"><i class="fa-brands fa-instagram"></i></div>
            </div>
            <div class="shoplink_wrap">
                <div class="row">
                    <div class="col-6">
                        <router-link to="/shop"><img src="@/assets/images/icon_bg/footer_icon_shop.svg" alt="">商品選購</router-link>
                    </div>
                    <div class="col-6">
                        <router-link to="/giftcard"><img src="@/assets/images/icon_bg/footer_icon_giftcard.svg" alt="">購買禮物卡</router-link>
                    </div>
                </div>
            </div>
            <div class="about_wrap">
                <div class="row">
                    <div class="col-6">
                        <router-link to="/game" class="site_link">
                            <div class="btn_icon btn_flat"><i class="fa-sharp fa-solid fa-arrow-right"></i></div>
                            今天吃什麼
                        </router-link>
                        <router-link to="/about" class="site_link">
                            <div class="btn_icon btn_flat"><i class="fa-sharp fa-solid fa-arrow-right"></i></div>
                            關於我們
                        </router-link>
                        <router-link to="/about" class="link_subtitle">
                            品牌故事
                        </router-link>
                        <router-link to="/about" class="link_subtitle">
                            訂購流程
                        </router-link>
                    </div>
                    <div class="col-6">
                        <router-link to="/source" class="site_link">
                            <div class="btn_icon btn_flat"><i class="fa-sharp fa-solid fa-arrow-right"></i></div>
                            食材溯源
                        </router-link>
                        <router-link to="/source" class="link_subtitle">
                            小農介紹
                        </router-link>
                        <router-link to="/source" class="link_subtitle">
                            安心肉品
                        </router-link>
                        <router-link to="/source" class="link_subtitle">
                            相關認證
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="contact_wrap">
                <div class="row">
                    <div class="col-6">
                        <router-link to="/faq"><img src="@/assets/images/icon_bg/footer_icon_faq.svg" alt="">常見問題</router-link>
                    </div>
                    <div class="col-6">
                        <a href=""><img src="@/assets/images/icon_bg/footer_icon_contact.svg" alt="">聯絡我們</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>本網站為緯育TibaMe_前端設計工程師班第83期學員專題成果作品,本平台僅供學習、展示之用。若有抵觸有關著作權,或有第三人主張侵害智慧財產權等情事,均由學員負法律上責任,緯育公司概不負責。若有侵權疑慮,您可以私訊[緯育TibaMe],後續會由專人協助處理。</p>
        </div>
    </footer>
</template>

<script>
// import MainHeader from '@/components/MainHeader.vue'

export default {
  // name: 'HomeView',
  // components: {
  //   MainHeader,
  // },
  data() {
    return {
      
    };
  },
  methods: {
    
  },
}
</script>

<style lang="scss">
    @import "@/assets/scss/all.scss";
    @import "@/assets/scss/layout/footer.scss";
</style>