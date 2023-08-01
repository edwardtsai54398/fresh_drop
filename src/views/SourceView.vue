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
                <!-- <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div> -->
            </div>
        </transition>
        <!-- 遮罩和彈窗 -->
        <div class="mask" v-if="showPopup" @click="closePopup"></div>
        <transition name="fade">
            <div v-if="showPopup" class="popup" @click="closePopup">
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
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn" class="ta_farmer02 pic" @click="openPopup2">
                <img :src="taiwan.Img3" alt="">
                <h3>綠意田園：清澈水源 無污染農產品</h3>
                <!-- <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div> -->
            </div>
        </transition>
        <!-- 遮罩和彈窗 -->
        <div class="mask" v-if="showPopup2" @click="closePopup2"></div>
        <transition name="fade">
            <div v-if="showPopup2" class="popup" @click="closePopup2">
                <div class="farmer1_popup">
                    <h3>｜綠意田園｜</h3>
                    <div class="popup_title_bg pic">
                        <img :src="popup.bg" alt="">
                    </div>
                    <div class="farmer1_pop_img pic">
                        <img :src="popup.fa1_Img3" alt="">
                    </div>
                    <p>{{ popup.text }}</p>
                    <div class="popup_title_bg2 pic">
                        <img :src="popup.bg2" alt="">
                    </div>
                    <div class="popup_bottom">
                        <div class="farmer1_pop_img2 pic">
                            <img :src="popup.fa1_Img4" alt="">
                        </div>
                        <p>{{ popup.text2 }}</p>
                        <div class="carrot">
                            <img :src="popup.carrot" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn2" class="ta_farmer03 pic" @click="openPopup3">
                <img :src="taiwan.Img4" alt="">
                <h3>新鮮田園：展現農村文化的魅力</h3>
                <!-- <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div> -->
            </div>
        </transition>
        <!-- 遮罩和彈窗 -->
        <div class="mask" v-if="showPopup3" @click="closePopup3"></div>
        <transition name="fade">
            <div v-if="showPopup3" class="popup" @click="closePopup3">
                <div class="farmer1_popup">
                    <h3>｜新鮮田園｜</h3>
                    <div class="popup_title_bg pic">
                        <img :src="popup.bg" alt="">
                    </div>
                    <div class="farmer1_pop_img pic">
                        <img :src="popup.fa1_Img5" alt="">
                    </div>
                    <p>{{ popup.text }}</p>
                    <div class="popup_title_bg2 pic">
                        <img :src="popup.bg2" alt="">
                    </div>
                    <div class="popup_bottom">
                        <div class="farmer1_pop_img2 pic">
                            <img :src="popup.fa1_Img6" alt="">
                        </div>
                        <p>{{ popup.text2 }}</p>
                        <div class="carrot">
                            <img :src="popup.carrot" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn3" class="ta_farmer04 pic" @click="openPopup4">
                <img :src="taiwan.Img5" alt="">
                <h3>綠野小農：共同創造永續農業</h3>
                <!-- <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div> -->
            </div>
        </transition>
        <!-- 遮罩和彈窗 -->
        <div class="mask" v-if="showPopup4" @click="closePopup4"></div>
        <transition name="fade">
            <div v-if="showPopup4" class="popup" @click="closePopup4">
                <div class="farmer1_popup">
                    <h3>｜綠野小農｜</h3>
                    <div class="popup_title_bg pic">
                        <img :src="popup.bg" alt="">
                    </div>
                    <div class="farmer1_pop_img pic">
                        <img :src="popup.fa1_Img7" alt="">
                    </div>
                    <p>{{ popup.text }}</p>
                    <div class="popup_title_bg2 pic">
                        <img :src="popup.bg2" alt="">
                    </div>
                    <div class="popup_bottom">
                        <div class="farmer1_pop_img2 pic">
                            <img :src="popup.fa1_Img8" alt="">
                        </div>
                        <p>{{ popup.text2 }}</p>
                        <div class="carrot">
                            <img :src="popup.carrot" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn3" class="ta_farmer05 pic" @click="openPopup5">
                <img :src="taiwan.Img6" alt="">
                <h3>翠綠農園：用心培育的在地食材</h3>
                <!-- <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div> -->
            </div>
        </transition>
        <!-- 遮罩和彈窗 -->
        <div class="mask" v-if="showPopup5" @click="closePopup5"></div>
        <transition name="fade">
            <div v-if="showPopup5" class="popup" @click="closePopup5">
                <div class="farmer1_popup">
                    <h3>｜翠綠農園｜</h3>
                    <div class="popup_title_bg pic">
                        <img :src="popup.bg" alt="">
                    </div>
                    <div class="farmer1_pop_img pic">
                        <img :src="popup.fa1_Img9" alt="">
                    </div>
                    <p>{{ popup.text }}</p>
                    <div class="popup_title_bg2 pic">
                        <img :src="popup.bg2" alt="">
                    </div>
                    <div class="popup_bottom">
                        <div class="farmer1_pop_img2 pic">
                            <img :src="popup.fa1_Img10" alt="">
                        </div>
                        <p>{{ popup.text2 }}</p>
                        <div class="carrot">
                            <img :src="popup.carrot" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="isFadeIn3" class="ta_farmer06 pic" @click="openPopup6">
                <img :src="taiwan.Img7" alt="">
                <h3>金土地農場：探索美味的根莖之旅</h3>
                <!-- <div class="check_in pic" ref="check_in">
                    <img :src="taiwan.checkIn" alt="">
                </div> -->
            </div>
        </transition>
        <!-- 遮罩和彈窗 -->
        <div class="mask" v-if="showPopup6" @click="closePopup6"></div>
        <transition name="fade">
            <div v-if="showPopup6" class="popup" @click="closePopup6">
                <div class="farmer1_popup">
                    <h3>｜金土地農場｜</h3>
                    <div class="popup_title_bg pic">
                        <img :src="popup.bg" alt="">
                    </div>
                    <div class="farmer1_pop_img pic">
                        <img :src="popup.fa1_Img11" alt="">
                    </div>
                    <p>{{ popup.text }}</p>
                    <div class="popup_title_bg2 pic">
                        <img :src="popup.bg2" alt="">
                    </div>
                    <div class="popup_bottom">
                        <div class="farmer1_pop_img2 pic">
                            <img :src="popup.fa1_Img12" alt="">
                        </div>
                        <p>{{ popup.text2 }}</p>
                        <div class="carrot">
                            <img :src="popup.carrot" alt="">
                        </div>
                    </div>
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
                // checkIn: require('@/assets/images/source/check_in.svg'),
                Img: require('@/assets/images/source/taiwan_map.svg'),
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
                fa1_Img3: require('@/assets/images/source/f05_1.png'),
                fa1_Img4: require('@/assets/images/source/f05_2.png'),
                fa1_Img5: require('@/assets/images/source/f06_1.png'),
                fa1_Img6: require('@/assets/images/source/f06_2.png'),
                fa1_Img7: require('@/assets/images/source/f07_1.png'),
                fa1_Img8: require('@/assets/images/source/f07_2.png'),
                fa1_Img9: require('@/assets/images/source/f08_1.png'),
                fa1_Img10: require('@/assets/images/source/f08_2.png'),
                fa1_Img11: require('@/assets/images/source/f09_1.png'),
                fa1_Img12: require('@/assets/images/source/f09_2.png'),
                text: '我們以提供多樣的蔬菜品種為榮，包括綠葉蔬菜、根莖類蔬菜、色彩鮮豔的辣椒等等。\n每一種蔬菜都經過精心培育，讓它在口感和營養價值方面發揮最大的潛力。\n從種子到收穫，我們注重每一個細節，為顧客提供最新鮮、最美味的蔬菜。',
                text2: '我們採用有機耕作方法，使用天然肥料，並輪作種植，以維護土壤肥力並減少對化學農藥的需求。\n我們對可持續農業的承諾確保我們的蔬菜不含有害化學物質，並與自然和諧共存。',
                bg: require('@/assets/images/source/farmers_title_bg.svg'),
                bg2: require('@/assets/images/source/farmers_bg.svg'),
                carrot: require('@/assets/images/source/carrot.png'),
            },
            //彈窗
            showPopup: false,
            showPopup2: false,
            showPopup3: false,
            showPopup4: false,
            showPopup5: false,
            showPopup6: false,

            farmImgOffset: 0,
            farmerImgOffset: 0,
            pepperImgOffset: 0,
            taiwanImgOffsetTop: 0,
            fadeOut: false,
            showTaiwanImg: false,
            isFadeIn: false,
            isFadeIn2: false,
            isFadeIn3: false,
            // fadeInThreshold: 700, // 設定淡入閾值為 800px
            // fadeOutThreshold: 1000, // 設定淡出閾值為 1000px
            // fadeInThreshold2: 1150,// 設定farmer03淡入閾值為 1200px
            // fadeOutThreshold2: 1450,
            // fadeInThreshold3: 1900,
            // fadeOutThreshold3: 2200,
            // scrollThreshold: 100, //預設滾動的數值
        };
    },
    methods: {
        //彈窗遮罩
        openPopup() {
            this.showPopup = true;
        },
        closePopup() {
            this.showPopup = false;
        },
        openPopup2() {
            this.showPopup2 = true;
        },
        closePopup2() {
            this.showPopup2 = false;
        },
        openPopup3() {
            this.showPopup3 = true;
        },
        closePopup3() {
            this.showPopup3 = false;
        },
        openPopup4() {
            this.showPopup4 = true;
        },
        closePopup4() {
            this.showPopup4 = false;
        },
        openPopup5() {
            this.showPopup5 = true;
        },
        closePopup5() {
            this.showPopup5 = false;
        },
        openPopup6() {
            this.showPopup6 = true;
        },
        closePopup6() {
            this.showPopup6 = false;
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
        handleResize() {
            const screenWidth = window.innerWidth;
            // 根據不同的斷點，設定不同的淡入淡出值和滾動數值
            if (screenWidth < 768) {
                this.fadeInThreshold = 600;
                this.fadeOutThreshold = 900;
                this.fadeInThreshold2 = 950;
                this.fadeOutThreshold2 = 1300;
                this.fadeInThreshold3 = 1350;
                this.fadeOutThreshold3 = 1700;
                this.scrollThreshold = 200;
            } else if (screenWidth >= 768 && screenWidth < 1024) {
                this.fadeInThreshold = 700;
                this.fadeOutThreshold = 1050;
                this.fadeInThreshold2 = 1050;
                this.fadeOutThreshold2 = 1350;
                this.fadeInThreshold3 = 1350;
                this.fadeOutThreshold3 = 1700;
                this.scrollThreshold = 350;
            } else {
                // 大於等於 1024px 的預設值
                this.fadeInThreshold = 650;
                this.fadeOutThreshold = 1080;
                this.fadeInThreshold2 = 1200;
                this.fadeOutThreshold2 = 1700;
                this.fadeInThreshold3 = 1900;
                this.fadeOutThreshold3 = 2500;
                this.scrollThreshold = 500;
            }
        },
    },


    mounted() {
        window.addEventListener('scroll', this.handleScroll);
        window.addEventListener('scroll', this.taiwanAnimate);
        const taiwanImgElement = this.$refs.taiwan;
        this.taiwanImgOffsetTop = taiwanImgElement.offsetTop;
        // 監聽視窗尺寸變化
        window.addEventListener('resize', this.handleResize);
        this.handleResize(); // 初始化時執行一次，確保初始值正確
    },

    beforeUnmount() {
        window.removeEventListener('scroll', this.taiwanAnimate);
        window.removeEventListener('resize', this.handleResize);
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/source.scss";
</style>