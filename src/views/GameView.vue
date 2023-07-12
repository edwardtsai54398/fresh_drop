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
        </div>
</template>
<script>
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
                        ]
                }
        },
        methods: {}
}
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/game.scss";
</style>
