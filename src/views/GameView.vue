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
                        <button class="choose_btn" :class="{ active: isClicked1 }" @click="handleClick1">
                            活潑好動的猴子
                        </button>
                        <button class="choose_btn" :class="{ active: isClicked2 }" @click="handleClick2">
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
                        <button class="choose_btn" :class="{ active: isClicked1 }" @click="handleClick1">
                            在家享受寧靜的休閒時光
                        </button>
                        <button class="choose_btn" :class="{ active: isClicked2 }" @click="handleClick2">
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
                        <button class="choose_btn" :class="{ active: isClicked1 }" @click="handleClick1">
                            隱形能力，隨時可以消失
                        </button>
                        <button class="choose_btn" :class="{ active: isClicked2 }" @click="handleClick2">
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
                        <button class="choose_btn" :class="{ active: isClicked1 }" @click="handleClick1">
                            立刻跳起來開始新的一天
                        </button>
                        <button class="choose_btn" :class="{ active: isClicked2 }" @click="handleClick2">
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
                        <button class="choose_btn" :class="{ active: isClicked1 }" @click="handleClick1">
                            無限供應的美味食物
                        </button>
                        <button class="choose_btn" :class="{ active: isClicked2 }" @click="handleClick2">
                            安裝了vscode的筆電
                        </button>
                        <button class="next_btn" @click="nextStep">看看結果</button>
                    </div>
                </div>
            </section>
        </transition>

        <!-- sum:{{ sum }}
                status:{{ status }}
                score:{{ score }}
                step:{{ step }} -->

        <!-- 分析結果 -->
        <transition name="fade" v-for="(item, index) in gameData" :key="index">
            <section class="analyze_card" v-show="!status && sum == (index + 5)">
                <div class="clip">
                    <img src="@/assets/images/game/clip.png" alt="">
                </div>
                <div class="wrap">
                    <div class="title">分析結果</div>
                    <div class="recommend row">
                        <div class="col-6">
                            <div class="pro_card">
                                <div class="pic">
                                    <img :src="require(`../assets/images/product/${item.dish1_pic}`)" alt="">

                                </div>
                                <h2>{{ item.dish1_recipe }}</h2>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pro_card">
                                <div class="pic">
                                    <img :src="require(`../assets/images/product/${item.dish2_pic}`)" alt="">
                                </div>
                                <h2>{{ item.dish2_recipe }}</h2>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pro_card">
                                <div class="pic">
                                    <img :src="require(`../assets/images/product/${item.dish3_pic}`)" alt="">
                                </div>
                                <h2>{{ item.dish3_recipe }}</h2>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pro_card">
                                <div class="pic">
                                    <img :src="require(`../assets/images/product/${item.dish4_pic}`)" alt="">
                                </div>
                                <h2>{{ item.dish4_recipe }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="analyze">
                        <p class="personality">|{{ item.personality }}|</p>
                        <p class="txt">{{ item.content }}</p>
                    </div>
                    <div class="btns_wrap">
                        <button class="next_btn" @click="goShop(item)">前往購買</button>
                        <button class="next_btn" @click="restartTest">再玩一次</button>
                    </div>
                </div>
            </section>
        </transition>

    </div>
</template>

<script>
// import productList from "@/assets/data/productList.js";

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
            gameData: [],
            types: [],
            productLists: []
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
        // 以下遊戲用
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
            this.productLists = []
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
        // 前往購買
        goShop(item) {
            console.log(123)
            console.log(item)
            console.log(item.dish1)
            this.productLists.push(
                { dish: item.dish1, dish_pic: item.dish1_pic, dish1_recipe: item.dish1_recipe, amount: 1, main: "主菜" },
                { dish: item.dish2, dish_pic: item.dish2_pic, dish2_recipe: item.dish2_recipe, amount: 1, main: "主菜" },
                { dish: item.dish3, dish_pic: item.dish3_pic, dish3_recipe: item.dish3_recipe, amount: 1, main: "湯品" },
                { dish: item.dish4, dish_pic: item.dish4_pic, dish4_recipe: item.dish4_recipe, amount: 1, main: "沙拉" },
            );

            // this.$store.commit("stateCartList", this.productLists);
            // this.$store.commit("statePlan", {
            //     plan: '單次購買',
            //     meal: 1,
            //     week: 1
            // });
            // this.$router.push("/shop");
        },
        //取得資料庫資料
        getGameData() {
            let url = `${this.$url}gameRows.php`
            this.axios.get(url).then(res => {
                this.gameData = res.data
            }).catch(err => {
                console.log(err);
            })
        },
    },
    watch: {
        gameData: {
            handler: function () {
                this.searchResult = this.gameData
            },
            deep: true
        },
    },
    mounted() {
        this.getGameData()
    },
}
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/game.scss";
</style>
