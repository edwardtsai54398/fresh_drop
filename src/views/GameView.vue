<template>
        <div class="game_container">
                <section class="bar_wrap" v-for="index in 5" :key="index" v-show="step === index">
                        <div class="bar" :style="{ width: progressWidth, background: getBarColor }">
                                <span v-show="step != 1">{{ progressPercentage }}</span>
                                <div class="icon">
                                        <img src="../assets/images/game/carrot.png" alt="">
                                </div>
                        </div>
                </section>

                <!-- 標語 -->
                <div class="solgan">
                        <p>不知道吃什麼嗎 一起來看看專屬於你的命定料理吧 </p>
                </div>

                <!-- 遊戲卡片 -->
                <!-- <section class="game_card" v-for="item in card" :key="item.id">
                        <div class="clip">
                                <img src="@/assets/images/game/clip.png" alt="">
                        </div>
                        <div class="wrap">
                                <div class="txt">
                                        <div class="title">{{ item.title }}</div>
                                        <div class="question">{{ item.question }}</div>
                                </div>
                                <div class="pic">
                                        <img :src="item.img" alt="">
                                </div>
                                <div class="btns_wrap">
                                        <button class="choose_btn" v-for="(option, index) in item.options" :key="index"
                                                :class="{ active: option.isClicked }" @click="handleClick(option)">
                                                {{ option.option }}
                                        </button>
                                        <button class="next_btn">下一題</button>
                                </div>
                        </div>
                </section> -->

                <transition name="fade">
                        <!-- card1 -->
                        <section class="game_card" v-show="step == 1 && status === true">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="txt">
                                                <div class="title">第一題</div>
                                                <div class="question">如果你是一隻動物，你會是</div>
                                        </div>
                                        <div class="pic">
                                                <img src="@/assets/images/game/game1.png" alt="">
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="choose_btn" :class="{ active: isClicked1 }"
                                                        @click="handleClick1">
                                                        活潑好動的猴子
                                                </button>
                                                <button class="choose_btn" :class="{ active: isClicked2 }"
                                                        @click="handleClick2">
                                                        溫和可愛的小兔子
                                                </button>
                                                <button class="next_btn" @click="nextStep">下一題</button>
                                        </div>
                                </div>
                        </section>
                </transition>


                <transition name="fade">
                        <!-- card2 -->
                        <section class="game_card" v-show="step == 2 && status === true">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="txt">
                                                <div class="title">第二題</div>
                                                <div class="question">在周末你喜歡</div>
                                        </div>
                                        <div class="pic">
                                                <img src="@/assets/images/game/game2.png" alt="">
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="choose_btn" :class="{ active: isClicked1 }"
                                                        @click="handleClick1">
                                                        在家享受寧靜的休閒時光
                                                </button>
                                                <button class="choose_btn" :class="{ active: isClicked2 }"
                                                        @click="handleClick2">
                                                        外出與朋友一同娛樂或探索新地方
                                                </button>
                                                <button class="next_btn" @click="nextStep">下一題</button>
                                        </div>
                                </div>
                        </section>
                </transition>


                <transition name="fade">
                        <!-- card3 -->
                        <section class="game_card" v-show="step == 3 && status === true">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="txt">
                                                <div class="title">第三題</div>
                                                <div class="question">如果你有超能力，你最想獲得</div>
                                        </div>
                                        <div class="pic">
                                                <img src="@/assets/images/game/game3.png" alt="">
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="choose_btn" :class="{ active: isClicked1 }"
                                                        @click="handleClick1">
                                                        隱形能力，隨時可以消失
                                                </button>
                                                <button class="choose_btn" :class="{ active: isClicked2 }"
                                                        @click="handleClick2">
                                                        心靈感應能力，讀懂他人思想
                                                </button>
                                                <button class="next_btn" @click="nextStep">下一題</button>
                                        </div>
                                </div>
                        </section>
                </transition>


                <transition name="fade">
                        <!-- card4 -->
                        <section class="game_card" v-show="step == 4 && status === true">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="txt">
                                                <div class="title">第四題</div>
                                                <div class="question">你在早上起床時通常會</div>
                                        </div>
                                        <div class="pic">
                                                <img src="@/assets/images/game/game4.png" alt="">
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="choose_btn" :class="{ active: isClicked1 }"
                                                        @click="handleClick1">
                                                        立刻跳起來開始新的一天
                                                </button>
                                                <button class="choose_btn" :class="{ active: isClicked2 }"
                                                        @click="handleClick2">
                                                        多按下鬧鐘幾次，繼續享受床上的舒適
                                                </button>
                                                <button class="next_btn" @click="nextStep">下一題</button>
                                        </div>
                                </div>
                        </section>
                </transition>


                <transition name="fade">
                        <!-- card5 -->
                        <section class="game_card" v-show="step == 5 && status === true">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="txt">
                                                <div class="title">第五題</div>
                                                <div class="question">如果你被困在一座荒島，你最需要的一樣東西是</div>
                                        </div>
                                        <div class="pic">
                                                <img src="@/assets/images/game/game5.png" alt="">
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="choose_btn" :class="{ active: isClicked1 }"
                                                        @click="handleClick1">
                                                        無限供應的美味食物
                                                </button>
                                                <button class="choose_btn" :class="{ active: isClicked2 }"
                                                        @click="handleClick2">
                                                        安裝了vscode的筆電
                                                </button>
                                                <button class="next_btn" @click="nextStep">看看結果</button>
                                        </div>
                                </div>
                        </section>
                </transition>

                <!-- 分析結果 -->
                <transition name="fade">
                        <!-- 結果5 -->
                        <section class="analyze_card" v-show="!status && sum == 5">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="title">分析結果</div>
                                        <div class="recommend row">
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[0].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[0].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[3].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[3].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[2].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[2].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[1].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[1].name }}</h2>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="analyze">
                                                <p class="personality">|{{ result[0].personality }}|</p>
                                                <p class="txt">{{ result[0].txt }}</p>
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="next_btn">前往購買</button>
                                                <button class="next_btn" @click="restartTest">再玩一次</button>
                                        </div>
                                </div>
                        </section>
                </transition>
                <transition name="fade">
                        <!-- 結果6 -->
                        <section class="analyze_card" v-show="!status && sum == 6">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="title">分析結果</div>
                                        <div class="recommend row">
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[4].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[4].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[5].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[5].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[6].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[6].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[7].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[7].name }}</h2>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="analyze">
                                                <p class="personality">|{{ result[1].personality }}|</p>
                                                <p class="txt">{{ result[1].txt }}</p>
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="next_btn">前往購買</button>
                                                <button class="next_btn" @click="restartTest">再玩一次</button>
                                        </div>
                                </div>
                        </section>
                </transition>
                <transition name="fade">
                        <!-- 結果7 -->
                        <section class="analyze_card" v-show="!status && sum == 7">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="title">分析結果</div>
                                        <div class="recommend row">
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[8].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[8].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[9].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[9].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[10].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[10].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[11].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[11].name }}</h2>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="analyze">
                                                <p class="personality">|{{ result[2].personality }}|</p>
                                                <p class="txt">{{ result[2].txt }}</p>
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="next_btn">前往購買</button>
                                                <button class="next_btn" @click="restartTest">再玩一次</button>
                                        </div>
                                </div>
                        </section>
                </transition>
                <transition name="fade">
                        <!-- 結果8 -->
                        <section class="analyze_card" v-show="!status && sum == 8">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="title">分析結果</div>
                                        <div class="recommend row">
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[12].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[12].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[13].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[13].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[14].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[14].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[15].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[15].name }}</h2>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="analyze">
                                                <p class="personality">|{{ result[3].personality }}|</p>
                                                <p class="txt">{{ result[3].txt }}</p>
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="next_btn">前往購買</button>
                                                <button class="next_btn" @click="restartTest">再玩一次</button>
                                        </div>
                                </div>
                        </section>
                </transition>
                <transition name="fade">
                        <!-- 結果9 -->
                        <section class="analyze_card" v-show="!status && sum == 9">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="title">分析結果</div>
                                        <div class="recommend row">
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[16].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[16].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[17].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[17].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[18].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[18].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[19].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[19].name }}</h2>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="analyze">
                                                <p class="personality">|{{ result[4].personality }}|</p>
                                                <p class="txt">{{ result[4].txt }}</p>
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="next_btn">前往購買</button>
                                                <button class="next_btn" @click="restartTest">再玩一次</button>
                                        </div>
                                </div>
                        </section>
                </transition>
                <transition name="fade">
                        <!-- 結果10 -->
                        <section class="analyze_card" v-show="!status && sum == 10">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="title">分析結果</div>
                                        <div class="recommend row">
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[20].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[20].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[21].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[21].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[22].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[22].name }}</h2>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="productList[23].img" alt="">
                                                                </div>
                                                                <h2>{{ productList[23].name }}</h2>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="analyze">
                                                <p class="personality">|{{ result[5].personality }}|</p>
                                                <p class="txt">{{ result[5].txt }}</p>
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="next_btn">前往購買</button>
                                                <button class="next_btn" @click="restartTest">再玩一次</button>
                                        </div>
                                </div>
                        </section>
                </transition>
                sum:{{ sum }}
                status:{{ status }}
                score:{{ score }}
                step:{{ step }}



        </div>
</template>

<script>
import productList from "@/assets/data/productList.js";

export default {
        data() {
                return {
                        step: 1, //遊戲階段
                        score: 0, //得分
                        status: true,//狀態:true為遊戲狀態; false為分析狀態
                        isClicked1: false,
                        isClicked2: false,
                        sum: 0,//總得分
                        card: [
                                {
                                        title: '第一題 ',
                                        question: '如果你是一隻動物，你會是',
                                        img: require('@/assets/images/game/game1.png'),
                                        options: [
                                                { option: '活潑好動的猴子' },
                                                { option: '溫和可愛的小兔子' }
                                        ],
                                        id: 1
                                },
                                {
                                        title: '第二題 ',
                                        question: '在周末你喜歡',
                                        img: require('@/assets/images/game/game2.png'),
                                        options: [
                                                { option: '在家享受寧靜的休閒時光' },
                                                { option: '外出與朋友一同娛樂或探索新地方' }
                                        ],
                                        id: 2
                                },
                                {
                                        title: '第三題 ',
                                        question: '如果你有超能力，你最想獲得',
                                        img: require('@/assets/images/game/game3.png'),
                                        options: [
                                                { option: '隱形能力，隨時可以消失' },
                                                { option: '心靈感應能力，讀懂他人思想' }
                                        ],
                                        id: 3
                                },
                                {
                                        title: '第四題 ',
                                        question: '你在早上起床時通常會',
                                        img: require('@/assets/images/game/game4.png'),
                                        options: [
                                                { option: '立刻跳起來開始新的一天' },
                                                { option: '多按下鬧鐘幾次，繼續享受床上的舒適' }
                                        ],
                                        id: 4
                                },
                                {
                                        title: '第五題 ',
                                        question: '如果你被困在一座荒島，你最需要的一樣東西是',
                                        img: require('@/assets/images/game/game5.png'),
                                        options: [
                                                { option: '無限供應的美味食物' },
                                                { option: '安裝了vscode的筆電' }
                                        ],
                                        id: 5
                                }
                        ],
                        result: [
                                {
                                        id: 1,
                                        personality: '冒險家',
                                        img: ``,
                                        txt: `對新奇和刺激的渴望使你喜歡嘗試不同的味道和料理、你尋求新的口味體驗、並享受冒烹飪過程。`,
                                },
                                {
                                        id: 2,
                                        personality: '安逸享受者',
                                        img: ``,
                                        txt: '分析原因：你對舒適和享受的追求使你喜歡選擇家常菜和溫和口味的食物。你尋求平衡和放鬆，享受那種讓你感到舒服和滿足的味道。',
                                },
                                {
                                        id: 3,
                                        personality: '創意人格',
                                        img: ``,
                                        txt: '分析原因：你的豐富創意和熱情驅使你追求獨特的飲食體驗。你喜歡嘗試新穎的料理和特色小吃，並將食物視為藝術和表達自我的方式。',
                                },
                                {
                                        id: 4,
                                        personality: '社交達人',
                                        img: ``,
                                        txt: '分析原因：你喜歡社交和人際交往，食物在社交場合中扮演重要角色。你喜歡分享美食，享受小吃和下午茶點等輕鬆的社交餐點。',
                                },
                                {
                                        id: 5,
                                        personality: '健康控',
                                        img: ``,
                                        txt: '分析原因：你對健康和營養的關注使你傾向選擇健康沙拉、素食料理和天然有機食物。你重視身體健康和營養均衡的飲食習慣。',
                                },
                                {
                                        id: 6,
                                        personality: '情感探索者',
                                        img: ``,
                                        txt: '分析原因：你對情感和內心探索感興趣，食物對你來說是情感療癒的一部分。你喜歡享受舒緩心情的甜點和心靈療癒的食物，並創造溫馨的烹飪體驗。',
                                },
                        ],
                        productList,
                }
        },
        computed: {
                //胡蘿蔔寬度調整
                progressWidth() {
                        return `${(this.step - 1) * 20}%`;
                },
                //胡蘿蔔內文調整
                progressPercentage() {
                        return `${(this.step - 1) * 20}%`;
                },
        },
        methods: {
                nextStep() {
                        this.isClicked1 = false,
                                this.isClicked2 = false,
                                this.sum += this.score;
                        if (this.score != 0) {
                                this.step++;
                                this.score = 0;
                                if (this.step == 6) {
                                        this.status = false;
                                }
                        }

                },
                restartTest() {
                        this.step = 1;
                        this.status = true;
                        this.sum = 0;
                },
                handleClick1() {
                        this.score = 1;
                        this.isClicked1 = true;
                        this.isClicked2 = false;
                },
                handleClick2() {
                        this.score = 2;
                        this.isClicked1 = false;
                        this.isClicked2 = true;
                },
        }
}
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/game.scss";
</style>
