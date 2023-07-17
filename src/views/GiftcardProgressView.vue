
<!-- 用vue做出form wizard: 
    https://www.youtube.com/watch?v=kdPxQWlNU5M -->

<template>
    <div class="giftcard_progress_container">
    <div class="root">
       <div class="progressbar-container">
        <ul class="progressbar">
        <li @click=changeStep(1) :class="{ active: step >= 1 } ">選擇收禮人</li>
        <li @click=changeStep(2) :class="{ active: step >= 2 }">選擇樣式</li>
        <li @click=changeStep(3) :class="{ active: step >= 3 }">客製禮物卡</li>
        <li @click=changeStep(4) :class="{ active: step >= 4 }">選擇金額</li>
        <li @click=changeStep(5) :class="{ active: step >= 5 }">完成</li>
            </ul>
        </div>
    </div>
    <form>
        <!-- step 1 -->
        <section v-if="step ==1" class="form-container">
            <h5>請選擇收禮對象</h5>
            <div class="to-button">
                <button class="btn_xs">親友</button>
                <button class="btn_xs">自己</button>
            </div>
            <div class="recipient-input">
                <label for="email">收禮人會員Email</label>
                <input type="email" placeholder="請輸入收禮人會員信箱" v-model="recipient.email" id="email" />
                <label for="text">收禮人姓名</label>
                <input type="text" placeholder="請輸入收禮人姓名" v-model="recipient.name" id="text" />
                <!-- <label for="date">寄送日期</label>
                <input type="date" placeholder="" v-model="recipient.date" id="date" /> -->
                
            </div>
            <button @click="nextStep" class="nextstep btn_s">下一步，挑選禮物卡</button>
        </section>
        <!-- step 2 -->
        <section v-if="step ==2" class="form-container">
            <h5>請選擇禮物卡樣式</h5>
           <div class="select-pic pic">
            <img :src="pic[0]" alt="">
           </div>
           <div class="piclist">
                <button class="left-button btn">
                    <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i></button>
                <div class="selected-pic pic">
                    <i class="fa-solid fa-circle-check" style="color: #1f8d61;"></i>
                    <img :src="pic[0]" alt="">
                </div>
                <div class="secondary-pic pic">
                    <img :src="pic[1]" alt="">
                </div>
                <button class="right-button btn">
                    <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></button>
           </div>
           <div class="upload_button">
           <button class="btn_xs">或上傳您的照片<i class="fa-solid fa-camera" style="color: #ffffff;"></i></button>
        </div>
            <p style="font-size: 12px;">＊圖片格式應為.jpg、.gif或.png。
                <br>＊檔案不得大於 1MB，小於 100K。</p>
            <button @click="nextStep" class="nextstep btn_s">下一步，客製禮物卡</button>
            <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
        </section>
        <!-- step 3 -->
        <section v-if="step ==3" class="form-container">
            <h5>客製您的禮物卡</h5>
           <div class="select-pic pic">
            <img :src="pic[0]" alt="">
           </div>
           <div class="add-sticker">
            <span>點擊添加圖案</span>
            <div class="sticker-list">
                <button class="left-button btn">
                    <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i></button>
                <img :src="sticker[0]" alt="">
                <img :src="sticker[1]" alt="">
                <img :src="sticker[2]" alt="">
                <img :src="sticker[3]" alt="">
                <button class="right-button btn">
                    <i class="fa-solid fa-arrow-right" style="color: #fff;"></i></button>
                </div>
           </div>
           
           <div class="add-text">
            <span>添加文字</span>
           </div>
            <div class="add-text-content">
            <div class="text-input">
                <input type="text" placeholder="請輸入訊息" id="text" />
                <i class="fa-solid fa-arrow-turn-down fa-rotate-90" style="color: #1f8d61;"></i>
            </div>
            <i class="fa-solid fa-palette" style="color:#1f8d61"></i>
            </div>
            
            
            <button @click="nextStep" class="nextstep btn_s">下一步，選擇禮物卡金額</button>
            <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
            
        </section>
        <!-- step 4 -->
        <section v-if="step ==4" class="form-container">
            <h5>請選擇禮物卡金額</h5>
            <div class="giftcard-money-input">
            <input type="number" id="giftcard-money" disabled value="500">
            <i class="fa-solid fa-dollar-sign" style="color: #CAE0C4;"></i></div>
            <div class="giftcard-money-wrap">
                <div v-for="(item, index) in giftcardMoney" :key="index" class="giftcard-money-button">
                    
                    <button><img src="../assets/images/icon_bg/price.svg" alt="">{{ item }}</button>
                </div>
            </div>

            <button @click="nextStep" class="nextstep btn_s">下一步</button>
            <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>


            </section>
        <!-- step 5 -->
        <section v-if="step ==5" class="form-container">
            <div class="finished">
            <i class="fa-solid fa-circle-check" style="color: #1f8d61;"></i>
            <h5>完成！</h5>
            </div>
            <div class="giftcard-detail">
                <div class="finished-pic pic">
                <img src="../assets/images/gift/giftcard_defaultpic_001.svg" alt="">
            </div>
            <div class="finished-text" v-for="(item, index) in detailTitle" :key="index">
            <div class="finished-title">
                <span>{{ Object.keys(item)[0] }} </span>
            </div>
            <div class="finished-item">
            <span>{{ Object.values(item)[0] }}</span>
        </div>    
        </div>


            </div>

            <button class="nextstep btn_s"><router-link to="#" style="color:#fff">結帳</router-link></button>
            <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
            </section>
    </form>
</div>

</template>
<script>
// import stepProgress from '../components/stepProgessSlider.vue'

export default {
    data() {
        return {
            step:1,
            totalsteps: 5,

            recipient:{
                email:'',
                name:'',
                date:''
            },
            pic:[require('@/assets/images/gift/giftcard_defaultpic_001.svg'),require('@/assets/images/gift/giftcard_defaultpic_002.svg')],
            sticker:[require('@/assets/images/gift/openmoji_wrapped-gift.svg'),require('@/assets/images/gift/openmoji_flower.svg'),require('@/assets/images/gift/openmoji_birthday-cake.svg'),require('@/assets/images/gift/openmoji_ribbon.svg'),require('@/assets/images/gift/openmoji_sparkles.svg')],
            giftcardMoney:[500, 800, 1000, 2000, 3000, 5000],
            detailTitle: [
        { '收禮人會員': 'jay@gmail.com' },
        { '收禮人姓名': '周杰倫' },
        { '金額': 500 }]
        
    }},
    methods: {
            nextStep: function() {
                this.step++;
            },
            previousStep: function(){
                this.step--;
            },
            changeStep(newStep) {
            this.step = newStep;
            },


    },

  }


</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/giftcard_progress.scss";



</style>
