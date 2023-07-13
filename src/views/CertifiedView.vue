<template>
    <section class="certifiedPage_container">
        <div class="certifiedPage_title">
            <h4>｜相關認證｜</h4>
        </div>
        <div class="banner_container">
            <div class="banner_img pic">
                <img :src="banner.bannerImg" alt="">
            </div>
            <div class="banner_title">
                <h5>{{ banner.bannerTitle }}</h5>
            </div>
            <div class="veg_ill pic">
                <img :src="banner.vegIllImg" alt="">
            </div>
            <div class="tom_ill pic">
                <img :src="banner.tomIllImg" alt="">
            </div>
            <div class="bg_img pic">
                <img :src="banner.bgImg" alt="">
            </div>
        </div>
        <div class="person_ill_container">
            <div class="person_container">
                <div class="person_box">
                    <div class="person_img pic">
                        <img :src="personIll.perIllImg" alt="">
                    </div>
                    <div class="person_title">
                        <h6>{{ personIll.title }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="person_ill_container">
            <div class="person_container">
                <div class="person_box">
                    <div class="person_img2 pic">
                        <img :src="personIll.perIllImg2" alt="">
                    </div>
                    <div class="person_title">
                        <h6>{{ personIll.title2 }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="person_ill_container">
            <div class="person_container">
                <div class="person_box">
                    <div class="person_img3 pic">
                        <img :src="personIll.perIllImg3" alt="">
                    </div>
                    <div class="person_title">
                        <h6>{{ personIll.title3 }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="certified_container">
        <div class="certified_title">
            <h5>{{ certified.title }}</h5>
        </div>
        <div class="certified_text">
            <p>{{ certified.text }}</p>
        </div>
        <div class="certified_img_container">
            <div class="certified_img pic">
                <img :src="certified.Img" alt="">
            </div>
        </div>
    </section>
    <div class="bgImg_container">
        <div class="circle pic">
            <img :src="bgBottom.Img" alt="">
        </div>
        <div class="mushroom pic">
            <img :src="bgBottom.Img2" alt="">
        </div>
        <div class="doctor pic">
            <img :src="bgBottom.Img3" alt="">
        </div>
    </div>
</template>
<script>
export default {
    name: 'CertifiedContainer',
    data() {
        return {
            banner: {
                bannerImg: require('@/assets/images/source/banner.png'),
                bannerTitle: '買的開心\n食的安心。\nEat Healthy,Eat Safe',
                vegIllImg: require('@/assets/images/source/cabbage.png'),
                tomIllImg: require('@/assets/images/source/tomato.png'),
                bgImg: require('@/assets/images/source/title_bg.png'),
            },
            personIll: {
                perIllImg: require('@/assets/images/source/person01.svg'),
                perIllImg2: require('@/assets/images/source/person02.svg'),
                perIllImg3: require('@/assets/images/source/person03.svg'),
                title: '口碑推薦，客人心中的首選美食',
                title2: '從土地到餐桌\n追求安心蔬菜的健康旅程',
                title3: '質量把關，追求檢驗的新鮮美食',
            },
            certified: {
                title: '｜檢驗報告｜',
                text: '通過CAS國家認證和產銷履歷雙驗證\n讓您食得安心',
                Img: require('@/assets/images/source/certified01.png'),
            },
            bgBottom: {
                Img: require('@/assets/images/source/certified_bgBottom.svg'),
                Img2: require('@/assets/images/source/mushroom.png'),
                Img3: require('@/assets/images/source/doctor.png'),
            }
        };
    },
    methods: {}
}
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/certified.scss";
</style>