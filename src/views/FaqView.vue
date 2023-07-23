<template>
    this page is FAQ
    <div class="container">
        <section class="question_type">
            <div
                class="type"
                v-for="(item, index) in faq"
                :key="index"
                @click="update(index)"
            >
                <div class="pic">
                    <img :src="item.icon" alt="" />
        <div class="container">
                <section class="question_type">
                        <div class="type" v-for="(item, index) in faq" :key="index" @click="update(index)">
                                <div class="pic">
                                        <img :src="item.icon" alt="">
                                </div>
                                <p>{{ item.type }}</p>
                        </div>
                </section>
                <p class="question_title">
                        {{ newFaq.type }}
                </p>
                <div class="group_wrap" v-for="(item, index) in newFaq.qa" :key="index" @click="toggleAnswer(item)">
                        <div class="icon" :class="{ open: item.open }" @click="toggleAnswer(item)">
                                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 9.18144L0.75 17.9988L0.75 0.364055L12 9.18144Z" fill="#1F8D61" />
                                </svg>
                        </div>
                        <div class="qa">
                                <div class="question">
                                        {{ item.questions }}
                                </div>
                                <transition name="slide">
                                        <div class="answer" v-show="item.open">
                                                <p> {{ item.answers }}</p>
                                        </div>
                                </transition>
                        </div>

                </div>
                <p>{{ item.type }}</p>
            </div>
        </section>
        <p class="question_title">
            {{ newFaq.type }}
        </p>
        <div
            class="group_wrap"
            v-for="(item, index) in newFaq.qa"
            :key="index"
            @click="toggleAnswer(item)"
        >
            <div
                class="icon"
                :class="{ open: item.open }"
                @click="toggleAnswer(item)"
            >
                <svg
                    width="12"
                    height="18"
                    viewBox="0 0 12 18"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M12 9.18144L0.75 17.9988L0.75 0.364055L12 9.18144Z"
                        fill="#1F8D61"
                    />
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
        <!-- <template>
                        <Collapse v-model="value" accordion>
                                <Panel name="1">
                                        史蒂夫·乔布斯
                                        <template #content>史蒂夫·乔布斯（Steve
                                                Jobs），1955年2月24日生于美国加利福尼亚州旧金山，美国发明家、企业家、美国苹果公司联合创办人。</template>
                                </Panel>
                                <Panel name="2">
                                        斯蒂夫·盖瑞·沃兹尼亚克
                                        <template #content>斯蒂夫·盖瑞·沃兹尼亚克（Stephen Gary
                                                Wozniak），美国电脑工程师，曾与史蒂夫·乔布斯合伙创立苹果电脑（今之苹果公司）。斯蒂夫·盖瑞·沃兹尼亚克曾就读于美国科罗拉多大学，后转学入美国著名高等学府加州大学伯克利分校（UC
                                                Berkeley）并获得电机工程及计算机（EECS）本科学位（1987年）。</template>
                                </Panel>
                                <Panel name="3">
                                        乔纳森·伊夫
                                        <template
                                                #content>乔纳森·伊夫是一位工业设计师，现任Apple公司设计师兼资深副总裁，英国爵士。他曾参与设计了iPod，iMac，iPhone，iPad等众多苹果产品。除了乔布斯，他是对苹果那些著名的产品最有影响力的人。</template>
                                </Panel>
                        </Collapse>
                </template> -->
    </div>
</template>

<script>
import faq from "@/assets/data/faq.js";
export default {
    data() {
        return {
            newFaq: faq[0], //預設顯示[0]的內容
            faq,
            value: "1",
        };
    },
    methods: {
        //切換下方問答群組
        update(index) {
            this.newFaq = { ...this.faq[index] }; //改變newFaq的資料
        },
        //qa開合用
        toggleAnswer(item) {
            this.newFaq.qa.forEach((qa) => {
                qa.open = false; // 把所有的欄位都關閉
            });
            item.open = !item.open; // 切换布林值
        },
    },
};
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/faq.scss";
</style>
