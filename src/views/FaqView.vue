<template>
    <div class="faq_container">
        <section class="question_type">
            <div class="type" v-for="(item, index) in types" :key="index" @click="update(item)">
                <div class="pic">
                    <img :src="item.icon" alt="" />
                </div>
                <p>{{ item.type }}</p>
            </div>
        </section>
        <p class="question_title">
            {{ newFaq.type }}
        </p>
        <div class="group_wrap" v-for="(item, index) in newData" :key="index" @click="toggleAnswer(item)">
            <div class="icon" :class="{ open: item.open }" @click="toggleAnswer(item)">
                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 9.18144L0.75 17.9988L0.75 0.364055L12 9.18144Z" fill="#1F8D61" />
                </svg>
            </div>
            <div class="qa">
                <div class="question">
                    {{ item.question_des }}
                </div>
                <transition name="slide">
                    <div class="answer" v-show="item.open">
                        <p>{{ item.ans }}</p>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
// import faq from "@/assets/data/faq.js";
export default {
    data() {
        return {
            faqData: [],
            newFaq: {
                type: "常見問題",
                icon: null,
            },
            value: "1",
            types: [
                {
                    type: "常見問題",
                    icon: require('@/assets/images/faq/1.svg'),
                },
                {
                    type: "會員註冊",
                    icon: require('@/assets/images/faq/2.svg'),
                },
                {
                    type: "付款問題",
                    icon: require('@/assets/images/faq/3.svg'),
                },
                {
                    type: "寄送問題",
                    icon: require('@/assets/images/faq/4.svg'),
                },
                {
                    type: "購物相關",
                    icon: require('@/assets/images/faq/5.svg'),
                },
                {
                    type: "訂單問題",
                    icon: require('@/assets/images/faq/6.svg'),
                },
                {
                    type: "禮物卡相關",
                    icon: require('@/assets/images/faq/7.svg'),
                },
                {
                    type: "退換貨問題",
                    icon: require('@/assets/images/faq/8.svg'),
                },
            ],
            newData: []
        };
    },
    methods: {
        //切換下方問答群組
        update(item) {
            this.newFaq = item; //改變newFaq的資料
            // this.newData = this.faqData.filter(entry => entry.question_group === this.newFaq.type);
            this.newData = this.faqData.filter(entry => entry.question_group === item.type);
        },
        //qa開合用
        toggleAnswer(clickedItem) {
            this.newData.forEach((item) => {
                if (item !== clickedItem) {
                    item.open = false; // 關閉其他答案
                }
            });
            clickedItem.open = !clickedItem.open; // 切換點擊的答案的狀態
        },
        //取得資料庫資料
        // getFaqData() {
        //     let url = `${this.$url}faqRows.php`
        //     this.axios.get(url).then(res => {
        //         this.faqData = res.data
        //     }).catch(err => {
        //         console.log(err);
        //     })
        // },
    },
    // watch: {
    //     faqData: {
    //         handler: function () {
    //             this.newData = this.faqData
    //         },
    //         deep: true
    //     },
    // },
    mounted() {
        // this.getFaqData()
    },
    created() {
        let url = `${this.$url}faqRows.php`
        this.axios.get(url).then(res => {
            this.faqData = res.data;
            this.update(this.types[0]); // 將newData設置為"常見問題"的內容
        }).catch(err => {
            console.log(err);
        })
    },
};
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/faq.scss";
</style>
