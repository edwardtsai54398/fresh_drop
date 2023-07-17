<template>
    <section class="sourceAll">
        <div class="scroll-container" @scroll="handleScroll">
            <div class="source_container" :class="{ hidden: hideContent }">
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
                    <div class="source_img pic">
                        <img :src="sourceTitle.Img" alt="">
                    </div>
                    <div class="pepper_img pic">
                        <img :src="sourceTitle.Img2" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="taiwan_container">
                <div class="taiwan_img pic">
                    <img :src="taiwan.Img" alt="">
                </div>
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
                Img2: require('@/assets/images/source/f03.png'),
            },
            taiwan:{
                Img:require('@/assets/images/source/Taiwan.svg'),
            },
            hideContent: false,
        };
    },
    //測試
    computed: {
        scrollContainer() {
            return document.querySelector('.scroll-container');
        },
    },
    methods: {
        handleScroll() {
            const scrollHeight = this.scrollContainer.scrollHeight;
            const scrollTop = this.scrollContainer.scrollTop;
            const containerHeight = this.scrollContainer.clientHeight;
            const threshold = 0.7;

            const scrollPercentage = scrollTop / (scrollHeight - containerHeight);

            if (scrollPercentage > threshold) {
                this.hideContent = true;
            } else {
                this.hideContent = false;
            }
        },
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/source.scss";
</style>