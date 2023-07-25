<template>
    <section class="index_health_banner" ref="indexHealthBanner">
        <div class="index_health_wrap">
            <div class="box" :style="`transform:translateX(-${translate}px)`" ref="healthWrap">
                <div class="title">
                    <p>HEALTH<br>VEGETABLE<br>
                        <span>食材朔源</span>
                    </p>
                    <div class="title_bg">
                        <img :src="vegetable.bg" alt="">
                    </div>
                </div>
                <div class="veg01 show_text" ref="veg01">
                    <img :src="vegetable.Img" alt="">
                    <div class="veg_bg"></div>
                    <div class="veg_title">
                        <p>高麗菜<br>CABBAGE</p>
                        <div class="veg_title_bg"></div>
                    </div>
                </div>
                <div class="veg02" ref="veg02">
                    <img :src="vegetable.Img2" alt="">
                    <div class="veg_bg"></div>
                    <div class="veg_title">
                        <p>花椰菜<br>BROCOLI</p>
                        <div class="veg_title_bg"></div>
                    </div>
                </div>
                <div class="veg03" ref="veg03">
                    <img :src="vegetable.Img3" alt="">
                    <div class="veg_bg"></div>
                    <div class="veg_title">
                        <p>甜椒<br>PEPPER</p>
                        <div class="veg_title_bg"></div>
                    </div>
                </div>
                <div class="veg04" ref="veg04">
                    <img :src="vegetable.Img4" alt="">
                    <div class="veg_bg"></div>
                    <div class="veg_title">
                        <p>南瓜<br>PUMPKIN</p>
                        <div class="veg_title_bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>


export default ({
    name: 'HomeView',
    data() {
        return {
            vegetable: {
                Img: require('@/assets/images/index/index_vefetable.png'),
                Img2: require('@/assets/images/index/index_vefetable1.png'),
                Img3: require('@/assets/images/index/index_vefetable2.png'),
                Img4: require('@/assets/images/index/index_vefetable3.png'),
                Img5: require('@/assets/images/index/zucchini.png'),
                bg: require('@/assets/images/icon_bg/bg_wholeyellow.svg'),
            },
            // isScrolling: false,
            scrollY: 0,
            translate: 0,
            prevScrollY: 0,//保存上一次的滾動位置
            winW: 0,
        };
    },

    methods: {
        handleScroll() {
            if (this.winW < 1200) {
                return
            } else if(this.winW >= 1200){
                const bannerTop = this.$refs.indexHealthBanner.offsetTop;
                const scrollY = window.scrollY;
    
                if (scrollY >= bannerTop) {
                    const veg04 = this.$refs.veg04;
                    const veg04Right = veg04.getBoundingClientRect().right;
                    const halfWindowWidth = this.winW / 2;
                    const vegs = document.querySelectorAll('[class*="veg0"]')
                    vegs.forEach((item, index) => {
                        const itemLeft = item.getBoundingClientRect().left;
                        const itemRight = item.getBoundingClientRect().right;
                        console.log(`${index+1}:${itemRight}`);
                        if (itemLeft < halfWindowWidth) {
                            item.classList.add('show_text')
                        }
                        if (itemRight < halfWindowWidth || itemLeft>halfWindowWidth) {
                            console.log(`第${index+1}離開`);
                            item.classList.remove('show_text')
                        }
                    })
                    
                    if (veg04Right > halfWindowWidth) {
                        this.scrollY = scrollY - bannerTop;
                        this.translate = this.scrollY;
                    } else {
                        // 判断滾動方向，根据滾動方向決定滑動方向
                        if (scrollY < this.prevScrollY) {
                            // 向上滾動，計算滾動的偏移量，取負值實現向右滑動效果
                            const scrollOffset = scrollY - this.prevScrollY;
                            this.translate += scrollOffset;
                        } else if (scrollY > this.prevScrollY) {
                            // 向下滾動，計算滾動的偏移量，實現向左滑動效果
                            return
                        }
                    }

                    // 更新上一次滾動的位置
                    this.prevScrollY = scrollY;
                }
            }

        },

    },
    created() {
        this.winW = window.innerWidth
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.handleScroll);
    },

});
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/home/homeIngrid.scss";
</style>