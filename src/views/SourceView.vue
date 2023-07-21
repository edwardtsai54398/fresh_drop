<template>
    <section class="sourceAll">
        <div class="scroll-container">
            <div class="source_container">
                <div class="sourcePage_title">
                    <h4>在地小農介紹<br><span>Local farmers</span></h4>
                </div>
                <div class="sourcePage_text">
                    <p>{{ sourceTitle.text }}</p>
                    <h5>探索在地小農的生態農業之旅</h5>
                    <div class="arrow">
                        <div class="triangle"></div>
                    </div>
                </div>
                <div class="source_img_container">
                    <transition name="fade">
                        <div class="farm_img pic"
                            :style="{ transform: `translateY(${farmImgOffset}px)`, opacity: fadeOut ? 0 : 1 }">
                            <img :src="sourceTitle.Img" alt="">
                        </div>
                    </transition>
                    <transition name="fade">
                        <div class="farmer_img pic" :style="{ opacity: fadeOut ? 0 : 1 }">
                            <img :src="sourceTitle.Img2" alt="">
                        </div>
                    </transition>
                    <transition name="fade">
                        <div class="pepper_img pic" :style="{ opacity: fadeOut ? 0 : 1 }">
                            <img :src="sourceTitle.Img3" alt="">
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </section>
    <section class="taiwan_container">
        <div ref="anchor1" class="anchor1"></div>
        <div ref="anchor2" class="anchor2"></div>
        <div ref="anchor3" class="anchor3"></div>
        <img ref="taiwan" :src="taiwan.Img" class="taiwan_img" alt="" @scroll="taiwanAnimate">
        <transition name="fade">
            <div v-if="isFadeIn" class="ta_farmer01 pic" @click="openPopup">
                <img :src="taiwan.Img2" alt="">
                <h3>蔬菜鄉村：農田風光與農作物寶藏</h3>
                <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="showPopup" class="popup" @click.stop>
                <div class="farmer1_popup">
                    <h3>｜蔬菜鄉村｜</h3>
                    <div class="popup_title_bg pic">
                        <img :src="popup.bg" alt="">
                    </div>
                    <div class="farmer1_pop_img pic">
                        <img :src="popup.fa1_Img" alt="">
                    </div>
                    <p>{{ popup.text }}</p>
                    <div class="popup_title_bg2 pic">
                        <img :src="popup.bg2" alt="">
                    </div>
                    <div class="popup_bottom">
                        <div class="farmer1_pop_img2 pic">
                            <img :src="popup.fa1_Img2" alt="">
                        </div>
                        <p>{{ popup.text2 }}</p>
                        <div class="carrot">
                            <img :src="popup.carrot" alt="">
                        </div>
                    </div>
                </div>
                <div class="overlay" @click="closePopup"></div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn" class="ta_farmer02 pic">
                <img :src="taiwan.Img3" alt="">
                <h3>綠意田園：清澈水源，無污染的農產品</h3>
                <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn2" class="ta_farmer03 pic">
                <img :src="taiwan.Img4" alt="">
                <h3>新鮮田園：展現農村文化的魅力</h3>
                <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn3" class="ta_farmer04 pic">
                <img :src="taiwan.Img5" alt="">
                <h3>綠野小農：共同創造永續農業的未來</h3>
                <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn3" class="ta_farmer05 pic">
                <img :src="taiwan.Img6" alt="">
                <h3>翠綠農園：用心培育的在地天然食材</h3>
                <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn3" class="ta_farmer06 pic">
                <img :src="taiwan.Img7" alt="">
                <h3>金土地農場：探索美味的根莖之旅</h3>
                <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div>
            </div>
        </transition>
    </section>
</template>
<script>
export default {
    name: 'SourceContainer',
    data() {
        return {
            sourceTitle: {
                text: '尊重土地和自然生態\n確保農作物的品質和安全\n以確保土壤的營養豐富和生態平衡。',
                Img: require('@/assets/images/source/f01.png'),
                Img2: require('@/assets/images/source/f02.png'),
                Img3: require('@/assets/images/source/f03.png'),
            },
            taiwan: {
                checkIn: require('@/assets/images/source/check_in.svg'),
                Img: require('@/assets/images/source/Taiwan.svg'),
                Img2: require('@/assets/images/source/f04.png'),
                Img3: require('@/assets/images/source/f06.png'),
                Img4: require('@/assets/images/source/f05.png'),
                Img5: require('@/assets/images/source/f07.png'),
                Img6: require('@/assets/images/source/f08.png'),
                Img7: require('@/assets/images/source/f09.png'),
            },
            popup: {
                fa1_Img: require('@/assets/images/source/f04_1.png'),
                fa1_Img2: require('@/assets/images/source/f04_2.png'),
                text: '我們以提供多樣的蔬菜品種為榮，包括綠葉蔬菜、根莖類蔬菜、色彩鮮豔的辣椒等等。\n每一種蔬菜都經過精心培育，讓它在口感和營養價值方面發揮最大的潛力。\n從種子到收穫，我們注重每一個細節，為顧客提供最新鮮、最美味的蔬菜。',
                text2: '我們採用有機耕作方法，使用天然肥料，並輪作種植，以維護土壤肥力並減少對化學農藥的需求。\n我們對可持續農業的承諾確保我們的蔬菜不含有害化學物質，並與自然和諧共存。',
                bg: require('@/assets/images/source/farmers_title_bg.svg'),
                bg2: require('@/assets/images/source/farmers_bg.svg'),
                carrot: require('@/assets/images/source/carrot.png'),
            },
            showPopup: false,
            farmImgOffset: 0,
            farmerImgOffset: 0,
            pepperImgOffset: 0,
            taiwanImgOffsetTop: 0,
            fadeOut: false,
            showTaiwanImg: false,
            isFadeIn: false,
            isFadeIn2: false,
            isFadeIn3: false,
            fadeInThreshold: 700, // 設定淡入閾值為 800px
            fadeOutThreshold: 1000, // 設定淡出閾值為 1000px
            fadeInThreshold2: 1100,// 設定farmer03淡入閾值為 1200px
            fadeOutThreshold2: 1350,
            fadeInThreshold3: 1400,
            fadeOutThreshold3: 1700,
        };
    },
    methods: {
        openPopup() {
            this.showPopup = true;
        },
        closePopup() {
            this.showPopup = false;
        },
        fadeOutFarmImg() {
            this.showFarmImg = false;
        },
        handleScroll() {

            const scrollY = window.scrollY;
            const fadeOutThreshold = 500; // 超過後開始淡出
            console.log(scrollY)
            //farm_img 的偏移量
            this.farmImgOffset = scrollY * 0.5;
            //farmer_img 的偏移量
            this.farmerImgOffset = -scrollY * 0.7;
            //pepper_img 的偏移量
            this.pepperImgOffset = scrollY * 0.7;
            this.fadeOut = scrollY > fadeOutThreshold;
        },
        taiwanAnimate() {
            const scrollY = window.scrollY;
            const acr1OffsetT = this.$refs.anchor1.offsetTop;
            const acr2OffsetT = this.$refs.anchor2.offsetTop;
            const acr3OffsetT = this.$refs.anchor3.offsetTop;

            const taiwan = this.$refs.taiwan;
            if (scrollY < acr1OffsetT) {
                taiwan.classList.remove('acr1');
            } else if (scrollY > acr1OffsetT && scrollY < acr2OffsetT) {
                taiwan.classList.add('acr1');
                taiwan.classList.remove('acr2');
            } else if (scrollY > acr2OffsetT && scrollY < acr3OffsetT) {
                taiwan.classList.add('acr2');
                taiwan.classList.remove('acr1');
                taiwan.classList.remove('acr3');
            } else if (scrollY > acr3OffsetT) {
                taiwan.classList.add('acr3');
                taiwan.classList.remove('acr2');
            }
            //taiwan_img不會被上面遮住
            const distanceFromTop = scrollY - this.taiwanImgOffsetTop;
            const fixedDistance = 100;
            if (distanceFromTop >= 0) {
                taiwan.style.top = `${fixedDistance}px`;
            } else {
                taiwan.style.top = `${this.taiwanImgOffsetTop}px`;
            }

            //ta_farmer01 淡入淡出
            // const fadeInThreshold = 800; // 設定淡入值為 800px
            if (scrollY > this.fadeInThreshold && scrollY <= this.fadeOutThreshold) {
                this.isFadeIn = true;
            } else {
                this.isFadeIn = false;
            }

            // Check if should fade in ta_farmer03
            if (scrollY > this.fadeInThreshold2 && scrollY <= this.fadeOutThreshold2) {
                this.isFadeIn2 = true;
            } else {
                this.isFadeIn2 = false;
            }
            // farmer04_05_06
            if (scrollY > this.fadeInThreshold3 && scrollY <= this.fadeOutThreshold3) {
                this.isFadeIn3 = true;
            } else {
                this.isFadeIn3 = false;
            }
        },
    },


    mounted() {
        window.addEventListener('scroll', this.handleScroll);
        window.addEventListener('scroll', this.taiwanAnimate);
        const taiwanImgElement = this.$refs.taiwan;
        this.taiwanImgOffsetTop = taiwanImgElement.offsetTop;
    },

    beforeUnmount() {
        window.removeEventListener('scroll', this.taiwanAnimate);
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/source.scss";
</style>