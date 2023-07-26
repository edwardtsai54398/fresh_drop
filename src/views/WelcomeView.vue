<template>
    <div class="logo_wrap">
        <div class="logo">
            <img :src="logoImg.logo" alt="">
        </div>
    </div>
    <section class="welcome_container">
        <router-link to="front">
            <div class="frontside">
                <div class="title">
                    <p>前台<br><span>訪客/會員入口</span></p>
                </div>
                <div class="logo_box">
                    <img :src="logoImg.img01" alt="">
                </div>
                <div class="logo_box2">
                    <img :src="logoImg.img02" alt="">
                </div>
            </div>
        </router-link>

        <a href="https://tibamef2e.com/chd102/g2/back" class="backside">
            <div class="title">
                <p>後台<br><span>管理員入口</span></p>
            </div>
            <div class="logo_box">
                <img :src="logoImg.img01" alt="">
            </div>
            <div class="logo_box2">
                <img :src="logoImg.img02" alt="">
            </div>
        </a>
    </section>
    <div class="welcome_copyright">
        <p>本網站為緯育TibaMe_前端設計工程師班第83期學員專題成果作品,本平台僅供學習、展示之用。若有抵觸有關著作權,或有第三人主張侵害智慧財產權等情事,均由學員負法律上責任,緯育公司概不負責。若有侵權疑慮,您可以私訊[
            <a href="https://www.facebook.com/TibaMe">緯育TibaMe</a> ],後續會由專人協助處理。
        </p>
    </div>
</template>
<script>


export default ({
    name: 'WelcomeView',
    components: {

    },
    data() {
        return {
            logoImg: {
                logo: require('@/assets/images/logo/logo.png'),
                img01: require('@/assets/images/welcome/logo_close.png'),
                img01_1: require('@/assets/images/welcome/logo_.png'),
                img02: require('@/assets/images/welcome/logo-W-2.png'),
            }
        }
    },
    methods: {

    },
});
</script>
<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/welcome.scss";
</style>
