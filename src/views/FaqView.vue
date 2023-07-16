<template>
        this page is FAQ
        <div class="container">
                <section class="question_type">
                        <div class="type" v-for="(item, index) in faq" :key="index" @click="update(index)">
                                <p>{{ item.type }}</p>
                        </div>
                </section>
                <p class="question_title">
                        {{ newFaq.type }}
                </p>
                <div class="group_wrap" v-for="(item, index) in newFaq.qa" :key="index" @click="toggleAnswer(item)">
                        <div class="icon">
                                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 9.18144L0.75 17.9988L0.75 0.364055L12 9.18144Z" fill="#1F8D61" />
                                </svg>
                        </div>
                        <div class="qa">
                                <div class="question">
                                        {{ item.questions }}
                                </div>
                                <transition name="slide">
                                        <div class="answer" v-if="item.open">
                                                {{ item.answers }}
                                        </div>
                                </transition>
                        </div>

                </div>
        </div>
</template>
<script>
import faq from "@/assets/data/faq.js";
export default {
        data() {
                return {
                        newFaq: faq[0],//預設顯示[0]的內容
                        faq,
                }
        },
        methods: {
                //切換下方問答群組
                update(index) {
                        this.newFaq = { ...this.faq[index] };//改變newFaq的資料
                },
                //qa開合用
                toggleAnswer(item) {
                        this.newFaq.qa.forEach((qa) => {
                                qa.open = false; // 把所有的欄位都關閉
                        });
                        item.open = !item.open; // 切换布林值
                }
        }
}
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/faq.scss";
</style>
