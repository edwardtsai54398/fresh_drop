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
                <div class="game_card" v-for="item in card" :key="item.id">
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
                                        <button class="choose_btn" :class="{ active: isClicked }" @click="changeColor">{{
                                                item.btn1
                                        }}</button>
                                        <button class="choose_btn" :class="{ active: !isClicked }" @click="changeColor">{{
                                                item.btn2
                                        }}</button>
                                        <button class="next_btn">下一題</button>
                                </div>
                        </div>
                </div>
                <div class="analyze_card">
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
                                        <button class="next_btn">再玩一次</button>
                                </div>
                        </div>
                </div>
        </div>
        <!-- =======以下測試 -->
        <div style="margin:0 auto 300px ;">
                <h1>心理測驗</h1>
                <div id="question-container" v-if="!showResult"></div>
                <div id="result-container" v-else></div>

                <div id="progress-bar" v-show="!showResult">
                        <div id="progress" :style="{ width: progressPercentage }"></div>
                </div>

                <button id="start-button" v-show="!showResult" @click="startTest">開始測驗</button>
                <button id="next-button" v-show="!showResult" @click="nextQuestion">下一個問題</button>
                <button id="restart-button" v-show="showResult" @click="restartTest">重新開始</button>
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
                        isClicked: false,
                        // ==========以下測試
                        questions: [
                                { question: "問題 1", options: ["a", "b"], weight: [1, 2] },
                                { question: "問題 2", options: ["a", "b"], weight: [1, 2] },
                                { question: "問題 3", options: ["a", "b"], weight: [1, 2] },
                                { question: "問題 4", options: ["a", "b"], weight: [1, 2] },
                                { question: "問題 5", options: ["a", "b"], weight: [1, 2] }
                        ],
                        currentIndex: 0,
                        totalWeight: 0,
                        showResult: false,
                        results: [
                                { range: [1, 5], text: "第一種結果" },
                                { range: [6, 10], text: "第二種結果" },
                                // 根據需求繼續添加其他結果
                        ],
                        resultText: "",
                        progressPercentage: "0%"
                }
        },
        methods: {
                changeColor() {
                        this.isClicked = !this.isClicked;
                },
                // ========以下測試
                startTest() {
                        this.showResult = false;
                        this.nextQuestion();
                },
                renderQuestion() {
                        const currentQuestion = this.questions[this.currentIndex];
                        const options = currentQuestion.options.map((option, index) => `
        <label>
          <input type="radio" name="option" value="${index}">
          ${option}
        </label>
      `).join('');

                        document.getElementById("question-container").innerHTML = `
        <p>${currentQuestion.question}</p>
        ${options}
      `;
                },
                nextQuestion() {
                        const currentQuestion = this.questions[this.currentIndex];
                        const selectedOption = document.querySelector('input[name="option"]:checked');

                        if (selectedOption) {
                                const selectedIndex = parseInt(selectedOption.value);
                                const selectedWeight = currentQuestion.weight[selectedIndex];
                                this.totalWeight += selectedWeight;
                        }

                        this.currentIndex++;

                        if (this.currentIndex < this.questions.length) {
                                this.renderQuestion();
                        } else {
                                this.showResult = true;
                                this.showResult();
                        }

                        this.updateProgress();
                        this.clearSelection();
                },
                clearSelection() {
                        const selectedOption = document.querySelector('input[name="option"]:checked');
                        if (selectedOption) {
                                selectedOption.checked = false;
                        }
                },
                // showResult() {
                //         for (const result of this.results) {
                //                 if (this.totalWeight >= result.range[0] && this.totalWeight <= result.range[1]) {
                //                         this.resultText = result.text;
                //                         break;
                //                 }
                //         }
                // },
                updateProgress() {
                        const progress = ((this.currentIndex + 1) / this.questions.length) * 100;
                        this.progressPercentage = `${progress}%`;
                },
                restartTest() {
                        this.currentIndex = 0;
                        this.totalWeight = 0;
                        this.showResult = false;
                        this.resultText = "";
                        this.progressPercentage = "0%";

                        document.getElementById("result-container").innerHTML = "";
                }
        }
}
</script>
<style scoped lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/game.scss";

#question-container,
#result-container {
        margin-bottom: 20px;
}

#progress-bar {
        width: 100%;
        height: 20px;
        background-color: #f2f2f2;
}

#progress {
        height: 100%;
        background-color: #4caf50;
}
</style>
