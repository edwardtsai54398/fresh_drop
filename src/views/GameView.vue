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


                <!-- sum:{{ sum }}
                status:{{ status }}
                score:{{ score }}
                step:{{ step }} -->

                <!-- 分析結果 -->
                <transition name="fade" v-for="(item, index) in result" :key="index">
                        <section class="analyze_card" v-show="!status && sum == (index + 5)">
                                <div class="clip">
                                        <img src="@/assets/images/game/clip.png" alt="">
                                </div>
                                <div class="wrap">
                                        <div class="title">分析結果</div>
                                        <div class="recommend row">
                                                <div class="col-6" v-for="(proItem, proIndex) in item.productLists"
                                                        :key="proIndex">
                                                        <div class="pro_card">
                                                                <div class="pic">
                                                                        <img :src="proItem.img" alt="">
                                                                </div>
                                                                <h2>{{ proItem.name }}</h2>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="analyze">
                                                <p class="personality">|{{ item.personality }}|</p>
                                                <p class="txt">{{ item.txt }}</p>
                                        </div>
                                        <div class="btns_wrap">
                                                <button class="next_btn" @click="goShop(item.productLists)">前往購買</button>
                                                <button class="next_btn" @click="restartTest">再玩一次</button>
                                        </div>
                                </div>
                        </section>
                </transition>



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
                                        txt: `對新奇和刺激的渴望使你喜歡嘗試不同的味道和料理、你尋求新的口味體驗、並享受冒烹飪過程。`,
                                        productLists: [
                                                {
                                                        name: "西班牙海鮮燉飯",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/12Spanish_Paella.jpg'),
                                                },
                                                {
                                                        name: "阿根廷燉牛肉",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/9Argentinian_beef_stew.jpg'),
                                                },
                                                {
                                                        name: "墨西哥辣味雞肉湯",
                                                        category: "湯品",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/22mexico_spicy_chickn_soup.jpg'),
                                                },
                                                {
                                                        name: "泰式生菜包",
                                                        category: "沙拉",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/26lettuce_wrap.jpg'),
                                                }
                                        ]
                                },
                                {
                                        id: 2,
                                        personality: '安逸享受者',
                                        txt: '分析原因：你對舒適和享受的追求使你喜歡選擇家常菜和溫和口味的食物。你尋求平衡和放鬆，享受那種讓你感到舒服和滿足的味道。',
                                        productLists: [
                                                {
                                                        name: "日本櫻花蝦天婦羅",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/13tempura.jpg'),
                                                },
                                                {
                                                        name: "奶油啤酒蛤蠣",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/2creamy_beer_clam.jpg'),
                                                },
                                                {
                                                        name: "馬來西亞椰奶雞湯",
                                                        category: "湯品",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/19malaysia_coconuts_soup.jpg'),
                                                },
                                                {
                                                        name: "巴西凱撒沙拉",
                                                        category: "沙拉",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/29brazil_caesar_salad.jpg'),
                                                }
                                        ]
                                },
                                {
                                        id: 3,
                                        personality: '創意人格',
                                        txt: '分析原因：你的豐富創意和熱情驅使你追求獨特的飲食體驗。你喜歡嘗試新穎的料理和特色小吃，並將食物視為藝術和表達自我的方式。',
                                        productLists: [
                                                {
                                                        name: "塔香茄子",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/3basil_eggplant.jpg'),
                                                },
                                                {
                                                        name: "中華彗星炒飯",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/6friedrice.jpg'),
                                                },
                                                {
                                                        name: "法國洋蔥湯",
                                                        category: "湯品",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/18onion_soup.jpg'),
                                                },
                                                {
                                                        name: "印度瑪撒拉薯仔沙拉",
                                                        category: "沙拉",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/28masal_potato_salad.jpg'),
                                                }
                                        ]
                                },
                                {
                                        id: 4,
                                        personality: '社交達人',
                                        txt: '分析原因：你喜歡社交和人際交往，食物在社交場合中扮演重要角色。你喜歡分享美食，享受小吃和下午茶點等輕鬆的社交餐點。',
                                        productLists: [
                                                {
                                                        name: "泡椒炒鮮魚",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/7bell_pepper_fish.jpg'),
                                                },
                                                {
                                                        name: "希臘烤羊肉",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/11greece_roast_lamb.jpg'),
                                                },
                                                {
                                                        name: "意大利米蘭湯",
                                                        category: "湯品",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/24milano_soup.jpg'),
                                                },
                                                {
                                                        name: "糖漬番茄",
                                                        category: "沙拉",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/25candied_tomato.jpg'),
                                                }
                                        ]
                                },
                                {
                                        id: 5,
                                        personality: '健康控',
                                        txt: '分析原因：你對健康和營養的關注使你傾向選擇健康沙拉、素食料理和天然有機食物。你重視身體健康和營養均衡的飲食習慣。',
                                        productLists: [
                                                {
                                                        name: "滑嫩番茄蛋",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/1tomaot_egg.jpg'),
                                                },
                                                {
                                                        name: "麻婆豆腐",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/5mapo_tofu.jpg'),
                                                },
                                                {
                                                        name: "泰式酸辣湯",
                                                        category: "湯品",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/23thai_hot_sour_soup.jpg'),
                                                },
                                                {
                                                        name: "中東麥麩沙拉",
                                                        category: "沙拉",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/27middleast_gluten_salad.jpg'),
                                                }
                                        ]
                                },
                                {
                                        id: 6,
                                        personality: '情感探索者',
                                        txt: '分析原因：你對情感和內心探索感興趣，食物對你來說是情感療癒的一部分。你喜歡享受舒緩心情的甜點和心靈療癒的食物，並創造溫馨的烹飪體驗。',
                                        productLists: [
                                                {
                                                        name: "越南河粉湯",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/14Vietnamese_noodles.jpg'),
                                                },
                                                {
                                                        name: "法國紅酒燉雞",
                                                        category: "主菜",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/8Coqauvin.jpg'),
                                                },
                                                {
                                                        name: "意大利肉醬千層麵",
                                                        category: "湯品",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/15Lasagna.jpg'),
                                                },
                                                {
                                                        name: "加拿大蔓越莓野菜沙拉",
                                                        category: "沙拉",
                                                        amount: 1,
                                                        img: require('@/assets/images/product/32crancherry_salad.jpg'),
                                                }
                                        ]
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
                goShop(productLists) {
                        this.$store.commit("setGameData", { userData: productLists });
                        this.$router.push("/shop");
                },
        }
}
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/game.scss";
</style>
