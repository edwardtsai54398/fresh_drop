<template>
        this page is FAQ
        <div class="container">
                <section class="question_type">
                        <div class="type" v-for="(item, index) in questions" :key="index">
                                <p>{{ item.type }}</p>
                        </div>
                </section>
                <p class="question_title">
                        {{ questions[0].type }}
                </p>
                <div class="group_wrap">
                        <div class="icon">
                                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 9.18144L0.75 17.9988L0.75 0.364055L12 9.18144Z" fill="#1F8D61" />
                                </svg>
                        </div>
                        <div class="qa">
                                <div class="question">qqqq</div>
                                <div class="answer">aaa</div>
                        </div>

                </div>
        </div>
</template>
<script>
// import productList from "@/assets/data/productList.js";
export default {
        data() {
                return {
                        questions: [
                                {
                                        type: '常見問題',
                                        id: 1,
                                        question: [1, 2, 3, 4, 5],
                                        answers: [1, 2, 3, 4, 5]
                                },
                                {
                                        type: '會員註冊問題',
                                        id: 2,
                                        question: [1, 2, 3, 4, 5, 6],
                                        answers: [1, 2, 3, 4, 5, 6]
                                },
                                {
                                        type: '付款問題',
                                        id: 3,
                                        question: [1, 2, 3, 4],
                                        answers: [1, 2, 3, 4]
                                },
                                {
                                        type: '寄送問題',
                                        id: 4,
                                        question: [1, 2, 3],
                                        answers: [1, 2, 3]
                                },
                                {
                                        type: '購物相關問題',
                                        id: 5,
                                        question: [1, 2, 3, 4, 5],
                                        answers: [1, 2, 3, 4, 5]
                                },
                                {
                                        type: '訂單問題',
                                        id: 6,
                                        question: [1, 2, 3, 4, 5],
                                        answers: [1, 2, 3, 4, 5]
                                },
                                {
                                        type: '禮物卡相關問題',
                                        id: 7,
                                        question: [1, 2, 3, 4, 5],
                                        answers: [1, 2, 3, 4, 5]
                                },
                                {
                                        type: '退換貨問題',
                                        id: 8,
                                        question: [1, 2, 3, 4, 5],
                                        answers: [1, 2, 3, 4, 5]
                                },
                        ]
                }
        },
        methods: {
        }
}
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/faq.scss";
</style>
