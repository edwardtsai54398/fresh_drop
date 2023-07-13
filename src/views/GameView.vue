<template>
        <div class="container">
                <div class="bar_wrap">
                        <div class="bar">
                                <span>50%</span>
                                <div class="icon">
                                        <img src="../assets/images/game/carrot.png" alt="">
                                </div>
                        </div>
                </div>
                <div class="solgan">
                        <p>不知道吃什麼嗎 一起來看看專屬於你的命定料理吧 </p>
                </div>
                <div class="card" v-for="item in card" :key="item.id">
                        <div class="wrap">
                                <div class="title">{{ item.title }}</div>
                                <div class="question">{{ item.question }}</div>
                                <div class="pic">
                                        <img :src="item.img" alt="">
                                </div>
                                <button class="choose_btn">{{ item.btn1 }}</button>
                                <button class="choose_btn">{{ item.btn2 }}</button>
                                <button class="next_btn">下一題</button>
                        </div>
                </div>
                <div class="card">
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
                                <p class="personality">|{{ result[0].personality }}|</p>
                                <p class="txt">{{ result[0].txt }}</p>
                                <button class="next_btn">前往購買</button>
                                <button class="next_btn">再玩一次</button>
                        </div>
                </div>
        </div>
</template>
<script>
import productList from "@/assets/data/productList.js";
export default {
        data() {
                return {
                        card: [
                                {
                                        title: '第一題 ',
                                        question: '如果你是一隻動物，你會是',
                                        img: require('@/assets/images/game/game1.png'),
                                        btn1: '活潑好動的猴子',
                                        btn2: '溫和可愛的小兔子',
                                        id: 1
                                },
                                {
                                        title: '第二題 ',
                                        question: '在周末你喜歡',
                                        img: require('@/assets/images/game/game2.png'),
                                        btn1: '在家享受寧靜的休閒時光',
                                        btn2: '外出與朋友一同娛樂或探索新地方',
                                        id: 2
                                },
                                {
                                        title: '第三題 ',
                                        question: '如果你有超能力，你最想獲得',
                                        img: require('@/assets/images/game/game3.png'),
                                        btn1: '隱形能力，隨時可以消失',
                                        btn2: '心靈感應能力，讀懂他人思想',
                                        id: 3
                                },
                                {
                                        title: '第四題 ',
                                        question: '你在早上起床時通常會',
                                        img: require('@/assets/images/game/game4.png'),
                                        btn1: '立刻跳起來開始新的一天',
                                        btn2: '多按下鬧鐘幾次，繼續享受床上的舒適',
                                        id: 4
                                },
                                {
                                        title: '第五題 ',
                                        question: '如果你被困在一座荒島，你最需要的一樣東西是',
                                        img: require('@/assets/images/game/game5.png'),
                                        btn1: '無限供應的美味食物',
                                        btn2: '安裝了vscode的筆電',
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
                        // sum,
                }
        },
        methods: {
                // game(){
                //         sum+1
                // }
        }
}
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/game.scss";
</style>
