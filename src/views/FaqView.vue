<template>
        this page is FAQ
        <div class="container">
                <section class="question_type">
                        <div class="type" v-for="(item, index) in faq" :key="index">
                                <p>{{ item.type }}</p>
                        </div>
                </section>
                <p class="question_title">
                        {{ faq[0].type }}
                </p>
                <div class="group_wrap" v-for="(item, index) in newFaq.questions" :key="index">
                        <div class="icon">
                                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 9.18144L0.75 17.9988L0.75 0.364055L12 9.18144Z" fill="#1F8D61" />
                                </svg>
                        </div>
                        <div class="qa" v-for="(item, index) in newFaq.qa" :key="index">
                                <div class="question">
                                        {{ item.questions }}
                                </div>
                                <div class="answer">
                                        {{ item.answers }}
                                </div>
                        </div>

                </div>
        </div>
</template>
<script>
import faq from "@/assets/data/faq.js";
export default {
        data() {
                return {
                        newFaq: faq[0],
                        faq,
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
