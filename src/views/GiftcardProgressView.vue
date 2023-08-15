<template>
    <div class="bgc">
        <div class="giftcard_progress_container">
            <!-- 步驟條 -->
            <div class="root">
                <div class="progressbar-container">

                    <!-- 手機版 -->
                    <ul class="progressbar">

                        <li @click=changeStep(1) :class="{ active: step >= 1 }" :disabled="!canChangeStep[1]">收禮人</li>
                        <li @click=changeStep(2) :class="{ active: step >= 2 }" :disabled="!canChangeStep[2]">樣式</li>
                        <li @click=changeStep(3) :class="{ active: step >= 3 }" :disabled="!canChangeStep[3]">客製</li>
                        <li @click=changeStep(4) :class="{ active: step >= 4 }" :disabled="!canChangeStep[4]">金額</li>
                        <li @click=changeStep(5) :class="{ active: step >= 5 }" :disabled="!canChangeStep[5]">完成</li>
                    </ul>
                    <!-- 768以上版 -->
                    <ul id="progressbar" class="progressbar">
                        <li @click=changeStep(1) :class="{ active: step >= 1 }" :disabled="!canChangeStep[1]">選擇收禮人</li>
                        <li @click=changeStep(2) :class="{ active: step >= 2 }" :disabled="!canChangeStep[2]">選擇樣式</li>
                        <li @click=changeStep(3) :class="{ active: step >= 3 }" :disabled="!canChangeStep[3]">客製禮物卡</li>
                        <li @click=changeStep(4) :class="{ active: step >= 4 }" :disabled="!canChangeStep[4]">選擇金額</li>
                        <li @click=changeStep(5) :class="{ active: step >= 5 }" :disabled="!canChangeStep[5]">完成</li>
                    </ul>
                </div>
            </div>
            <form>
                <!-- step 1 -->
                <section v-if="step == 1" class="form_container">
                    <div class="decoration-tomato pic">
                        <img src="../assets/images/source/tomato.png" alt="">
                    </div>
                    <div class="decoration-carrot pic">
                        <img src="../assets/images/source/carrot.png" alt="">
                    </div>

                    <h5>請選擇收禮對象</h5>
                    <!-- 選送親友或自己按鈕 -->
                    <div class="to-button">
                        <button class="btn_xs" :class="{ inactive: isSelfClicked }" type="button"
                                @click="isOtherClicked = true, isSelfClicked = false">親友</button>
                        <button class="btn_xs" :class="{ inactive: isOtherClicked }" type="button"
                                @click="isSelfClicked = true, isOtherClicked = false, selfClicked()">自己</button>
                    </div>
                    <!-- 送親友才出現輸入框 -->
                    <div class="recipient-input" v-if="isOtherClicked === true">
                        <label for="email">收禮人會員Email</label>
                        <input type="email" placeholder="請輸入收禮人會員信箱" v-model="recipient.email" id="email" />
                        <label for="text">收禮人姓名</label>
                        <input type="text" placeholder="請輸入收禮人姓名" v-model="recipient.name" id="text" />
                    </div>
                    <!-- 輸入框是空的跳錯誤訊息 -->
                    <div v-if="showErrorMessage && isOtherClicked && (!recipient.email || !recipient.name)"
                            class="error-message">
                        <span v-if="!recipient.email">請輸入收禮人會員信箱<br></span>
                        <span v-if="!recipient.name">請輸入收禮人姓名</span>
                    </div>
                    <button @click="validateAndNext($event)" class="nextstep btn_xs">下一步，挑選禮物卡</button>
                </section>

                <!-- step 2 -->
                <section v-if="step == 2" class="form_container">
                    <!-- 桌機板蔬果裝飾 -->
                    <div class="decoration-tomato pic">
                        <img src="../assets/images/source/tomato.png" alt="">
                    </div>
                    <div class="decoration-carrot pic">
                        <img src="../assets/images/source/carrot.png" alt="">
                    </div>

                    <h5>請選擇禮物卡樣式</h5>
                    <!-- 大圖顯示上傳的圖片或是選擇的預設圖片 -->
                    <div class="select-pic pic">
                        <img :src="uploadedImage || selectedPic" alt="">
                    </div>
                    <!-- 預設圖清單(輪播) -->
                    <div class="piclist">
                        <carousel v-bind="settings" :breakpoints="breakpoints">
                            <slide v-for="slide in giftcardData" :key="slide">
                                <div class="giftcard_pic box" @click="selectPic(slide.giftcard_defaultpic_url)">
                                    <img :src="require(`@/assets/images/gift/${slide.giftcard_defaultpic_url}`)" alt="">
                                </div>
                            </slide>
                            <template #addons>
                                <navigation />
                                <pagination />
                            </template>
                        </carousel>
                    </div>
                    <!-- 上傳圖片按鈕 -->
                    <div class="upload_button">
                        <label for="fileInput" class="btn_xs">或上傳您的照片

                            <font-awesome-icon icon="fa-solid fa-camera" style="color: #ffffff; " />

                        </label>
                        <input id="fileInput" type="file" ref="fileInput" style="display: none" @change="handleFileUpload">
                    </div>

                    <p style="font-size: 12px;">＊圖片格式應為.jpg、.gif或.png。
                        <br>＊檔案不得大於 1MB，小於 100K。
                    </p>

                    <button @click="nextStep" class="nextstep btn_xs">下一步，客製禮物卡</button>
                    <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
                </section>

                <!-- step 3 -->
                <section v-if="step == 3" class="form_container">
                    <!-- 桌機板蔬果裝飾 -->
                    <div class="decoration-tomato pic">
                        <img src="../assets/images/source/tomato.png" alt="">
                    </div>
                    <div class="decoration-carrot pic">
                        <img src="../assets/images/source/carrot.png" alt="">
                    </div>

                    <h5>客製您的禮物卡</h5>

                    <div class="select-pic pic html2canvas" ref="html2canvas" id="capture" @mousemove="onDrag"
                            @touchmove="onDrag" @mousedown="startDragging1" @touchstart="startDragging1">

                        <div style="position: relative;">
                            <!-- Image -->
                            <img :src="uploadedImage || selectedPic" alt="" @mousedown="startDragging1"
                                    @touchmove="startDragging1" @mouseup="stopDragging1" :style="{
                                        cursor: dragging ? 'grabbing' : 'grab',
                                    }">
                            <!-- Text -->
                            <div :style="{
                                position: 'absolute',
                                left: textPosition.x + 'px',
                                top: textPosition.y + 'px',
                                color: textColor,
                                background: 'rgba(255, 255, 255, 0.7)',
                                padding: '4px 8px',
                                borderRadius: '4px',
                            }" @mouseup="stopDragging">{{ text }}</div>

                            <div v-for="selectedSlide in selectedSlides" :key="selectedSlide.src" :style="{
                                position: 'absolute',
                                left: selectedSlide.x + 'px',
                                top: selectedSlide.y + 'px',
                                // width: selectedSlide.width + 'px',
                                // height: selectedSlide.height + 'px',

                            }" @mousedown="startDragging(selectedSlide, $event)"
                                    @touchstart="startDragging(selectedSlide, $event)"
                                    @mousemove="onDragging(selectedSlide, $event)"
                                    @touchmove="onDragging(selectedSlide, $event)" @touchend="stopDragging"
                                    @mouseup="stopDragging">
                                <img :src="selectedSlide.src" alt="">
                            </div>


                        </div>




                    </div>

                    <!-- 圖示拖拉 -->
                    <!-- <div class="sticker-overlay" ref="stickerOverlay" v-if="selectedSticker" :style="{
                        backgroundImage: 'url(' + selectedSticker.src + ')',
                        width: selectedSticker.width + 'px',
                        height: selectedSticker.height + 'px',
                        transform: 'translate(' + selectedSticker.x + 'px, ' + selectedSticker.y + 'px)'
                    }" @touchstart="startDragging" @mousedown="startDragging"></div> -->

                    <!--  圖示輪播 -->
                    <div class="add-sticker">
                        <span>點擊添加圖案</span>
                        <div class="sticker-list">
                            <carousel v-bind="stickerSettings" :breakpoints="stickerBreakpoints">
                                <slide v-for="slide in sticker" :key="slide">
                                    <div class="stickerBox" @click="selectSticker(slide)">
                                        <img :src="slide" alt="">
                                    </div>
                                </slide>
                                <template #addons>
                                    <navigation />
                                    <pagination />
                                </template>
                            </carousel>

                        </div>
                    </div>

                    <div class="add-text">
                        <span>添加文字</span>
                    </div>
                    <div class="add-text-content">
                        <div class="text-input">
                            <input v-model="text" type="text" placeholder="請輸入訊息" />
                            <font-awesome-icon icon="fa-solid fa-arrow-turn-down" rotation=90 />
                        </div>
                        <input id="colorPicker" type="color" v-model="textColor">
                    </div>

                    <button @click="downloadCanvas" class="nextstep btn_xs" id="btnDownload"
                            type="button">下一步，選擇禮物卡金額</button>
                    <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>

                </section>

                <!-- step 4 -->
                <section v-if="step == 4" class="form_container">
                    <!-- 桌機板蔬果裝飾 -->
                    <div class="decoration-tomato pic">
                        <img src="../assets/images/source/tomato.png" alt="">
                    </div>
                    <div class="decoration-carrot pic">
                        <img src="../assets/images/source/carrot.png" alt="">
                    </div>

                    <h5>請選擇禮物卡金額</h5>
                    <div class="giftcard-money-input">
                        <input type="number" id="giftcard-money" disabled :value="selectedGiftCardAmount">
                        <font-awesome-icon icon="fa-solid fa-dollar-sign"
                                style="color: #1F8D61; font-size: 20px;position: absolute;top: 28%;left: 10%" />
                    </div>
                    <div class="giftcard-money-wrap">
                        <div v-for="(item, index) in giftcardMoney" :key="index" class="giftcard-money-button">
                            <button :id="'money-button-' + index" class="btn_flat" type="button"
                                    @click="updateGiftCardAmount(item)">
                                <img src="../assets/images/icon_bg/price.svg" alt="">{{ item }}
                            </button>
                        </div>

                    </div>

                    <button @click="nextStep" class="nextstep btn_xs">下一步</button>
                    <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
                </section>

                <!-- step 5 -->

                <section v-if="step == 5" class="form_container">
                    <!-- 桌機板蔬果裝飾 -->
                    <div class="decoration-tomato pic">
                        <img src="../assets/images/source/tomato.png" alt="">
                    </div>
                    <div class="decoration-carrot pic">
                        <img src="../assets/images/source/carrot.png" alt="">
                    </div>

                    <div class="finished">
                        <font-awesome-icon icon="fa-solid fa-circle-check"
                                style="color: #1F8D61; font-size: 70px; margin-bottom: 10px;" />
                        <h5>完成！</h5>
                    </div>

                    <div class="giftcard-detail">
                        <!-- 待改使用者客製圖片 -->
                        <div class="finished-pic pic">
                            <img :src="customImageURL" alt="">
                        </div>

                        <div class="text-wrap">

                            <div class="finished-text" v-for="(item, index) in detailTitle" :key="index">
                                <!-- 項目標題 -->
                                <div class="finished-title">
                                    <span>{{ Object.keys(item)[0] }} </span>
                                </div>

                                <!-- 使用者前面填的收禮人資料 & 選擇的金額 -->
                                <div class="finished-item">
                                    <span v-if="Object.keys(item)[0] === '收禮人會員'">{{ recipient.email }}</span>
                                    <span v-if="Object.keys(item)[0] === '收禮人姓名'">{{ recipient.name }}</span>

                                    <!-- 如果選第一步驟選"自己", 不顯示收禮人 -->
                                    <span v-if="Object.keys(item)[0] !== '收禮人會員' && Object.keys(item)[0] !== '收禮人姓名'">{{
                                        item[Object.keys(item)[0]] }}</span>

                                </div>
                            </div>

                            <div class="selected-giftcard-amount">
                                <div class="finished-title">
                                    <span>禮物卡金額</span>
                                </div>
                                <div class="finished-item"> <span>$ {{ selectedGiftCardAmount }}</span></div>
                            </div>
                        </div>
                    </div>

                    <button class="nextstep btn_s" @click="payCheck">結帳</button>
                    <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
                </section>
            </form>

        </div>
    </div>
</template>


<script>

import { defineComponent } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import html2canvas from 'html2canvas'; // eslint-disable-line no-unused-vars
import 'vue3-carousel/dist/carousel.css';
// 輪播
export default defineComponent({
    name: 'GiftProgress',
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data() {
        return {
            dragData: null, // 用來儲存拖拉起始點的資料,
            customImageURL: "",
            step: 1,
            totalsteps: 5,
            canChangeStep: [true, true, false, false, false],
            // Step 1
            isOtherClicked: true,
            isSelfClicked: false,
            showErrorMessage: false,
            // 收禮人資料
            recipient: {
                email: '',
                name: '',
            },
            // Step 2
            uploadedImage: null, //使用者上傳圖片
            selectedPic: require('@/assets/images/gift/giftcard_defaultpic_001.svg'), //預設樣式1
            giftcardData: [ // 樣式圖片

                // require('@/assets/images/gift/giftcard_defaultpic_002.svg'),
                // require('@/assets/images/gift/giftcard_defaultpic_003.svg'),
                // require('@/assets/images/gift/giftcard_defaultpic_004.svg'),
                // require('@/assets/images/gift/giftcard_defaultpic_005.svg'),
                // require('@/assets/images/gift/giftcard_defaultpic_006.svg')
            ],

            // 禮物卡樣式輪播
            settings: {
                itemsToShow: 2,
                snapAlign: 'center',
            },
            stickerSettings: {
                itemsToShow: 4,
                snapAlign: 'center',
            },
            breakpoints: {
                // 700px and up
                540: {
                    itemsToShow: 3,
                    snapAlign: 'center',
                },
                // 700: {
                //     itemsToShow: 3,
                //     snapAlign: 'center',
                // },
                // // 1024 and up
                // 1024: {
                //     itemsToShow: 3,
                //     snapAlign: 'center',
                // }
            },

            //Step 3
            selectedSlides: [], //使用者選取圖示
            sticker: [ //圖示圖片
                require('@/assets/images/gift/openmoji_wrapped-gift.svg'),
                require('@/assets/images/gift/openmoji_flower.svg'),
                require('@/assets/images/gift/openmoji_birthday-cake.svg'),
                require('@/assets/images/gift/openmoji_ribbon.svg'),
                require('@/assets/images/gift/openmoji_sparkles.svg')
            ],
            // 圖示輪播
            stickerBreakpoints: {
                // 700px and up
                700: {
                    itemsToShow: 4,
                    snapAlign: 'center',
                },
                // 1024 and up
                1024: {
                    itemsToShow: 5,
                    snapAlign: 'center',
                }
            },

            text: "",            // 输入框中的文字
            textColor: "#000000", // 文字颜色，默认为黑色
            textPosition: {      // 文字位置
                x: 0,
                y: 0
            },
            dragging: false,     // 是否正在拖拽文字
            draggingText: false,
            //Step 4
            giftcardMoney: [500, 800, 1000, 2000, 3000, 5000], //金額按鈕
            selectedGiftCardAmount: 500, //預設金額500
            // Step 5
            detailTitle: [],
        }
    },
    methods: {
        payCheck() {
            event.preventDefault();
            if (!this.$store.state.isLogin) {
                alert('請先登入會員')
                this.$store.state.isLoginOpen = true
            } else {
                if (this.$store.state.cartList[0].length > 0) {
                    let choose = confirm('結帳頁仍有商品未結帳，確定要把結帳頁的商品清空嗎?')
                    if (!choose) {
                        return
                    } else {
                        this.$store.commit('clearState', 'cart')
                    }
                }
                if (this.$store.state.cartList[0].length == 0) {
                    let name = ''
                    let email = ''
                    if (this.isSelfClicked) {
                        name = '自己'
                        email = this.$store.state.memberInfoAll.info.cus_email
                    } else {
                        name = this.recipient.name
                        email = this.recipient.email
                    }
                    this.$store.commit('stateGiftBuy', {
                        name: name,
                        email: email,
                        img: this.customImageURL,
                        money: this.selectedGiftCardAmount
                    })
                    this.$router.push('/pay')
                }
            }

        },

        // 收禮人如果選自己, 不出現輸入框
        selfClicked() {
            this.detailTitle = [];
            this.recipient.email = '';
            this.recipient.name = '';
        },

        // 輸入收禮人資料才能按下一步
        validateAndNext(event) {
            event.preventDefault();

            if (this.isOtherClicked && (!this.recipient.email || !this.recipient.name)) {
                this.showErrorMessage = true;
                return;
            }

            if (this.isOtherClicked && this.recipient.email && this.recipient.name) {
                if (typeof this.detailTitle === 'string') {
                    this.detailTitle = [];
                }
                const existingRecipient = this.detailTitle.find(item => Object.keys(item)[0] === '收禮人會員');
                if (!existingRecipient) {
                    this.detailTitle.push({ '收禮人會員': this.recipient.email });
                    this.detailTitle.push({ '收禮人姓名': this.recipient.name });
                }
            }
            if (this.isOtherClicked) {
                let url = `${this.$url}giftReciveExist.php`
                let params = new URLSearchParams()
                params.append("email", this.recipient.email)
                this.axios.post(url, params)
                    .then(res => {
                        if (!res.data) {
                            alert('此E-mail不是我們的會員，無法收到禮物卡。\r請確認收禮者的E-mail有註冊會員')
                            return
                        }
                        for (let i = 0; i <= this.step + 1; i++) {
                            this.canChangeStep[i] = true;
                        }
                        this.step++;
                    })
                    .catch(err => {
                        console.log(err);
                    })
            } else {

                for (let i = 0; i <= this.step + 1; i++) {
                    this.canChangeStep[i] = true;
                }
                this.step++;
            }
        },

        //下一步
        nextStep() {

            for (let i = 0; i <= this.step + 1; i++) {
                this.canChangeStep[i] = true;
            }
            this.step++;
        },

        //上一步
        previousStep() {
            this.step--;
        },

        //進度條切換步驟
        changeStep(newStep) {
            if (this.canChangeStep[newStep] && !(this.isOtherClicked && (!this.recipient.email || !this.recipient.name))) {
                this.step = newStep;
            } else {
                this.showErrorMessage = true;
                return;

            }
        },

        //選擇的樣式圖片

        // selectPic(pic) {
        //     this.uploadedImage = null;
        //     this.selectedPic = pic;
        // },

        selectPic(pic) {
            // 先将所有图片元素的selected类名移除
            const allPicElements = document.querySelectorAll('.piclist .giftcard_pic');
            allPicElements.forEach(picElement => {
                picElement.classList.remove('selected');
            });

            // 设置选中图片，并为其添加selected类名
            this.uploadedImage = null;
            this.selectedPic = require(`@/assets/images/gift/${pic}`);
            const selectedPicElement = document.querySelector(`.piclist .giftcard_pic img[src="${this.selectedPic}"]`);
            if (selectedPicElement) {
                selectedPicElement.parentElement.classList.add('selected');
            }
        },

        //上傳圖片
        handleFileUpload(event) {
            const file = event.target.files[0];

            // Validate the file format and size if needed
            // For example, check if it's an image and meets size requirements

            // Read the file as a Data URL to display the uploaded image
            const reader = new FileReader();
            reader.onload = () => {
                this.uploadedImage = reader.result;
            };
            reader.readAsDataURL(file);
        },

        //點選圖示(待修正)
        selectSticker(slide) {

            this.selectedSlides.push({
                src: slide,
                x: 0,
                y: 0,
                width: 60,
                height: 60,
            });
        },

        getGiftcardData() {
            let url = `${this.$url}giftcardPic.php`
            this.axios.get(url).then(res => {
                this.giftcardData = res.data;

            }).catch(err => {
                console.log(err);
            })
        },


        //-------------------圖示&文字拖拉開始------------------

        startDragging(selectedSlide, event) {
            if (event.type === 'touchstart') {
                const touch = event.touches[0]; // Get the first touch
                this.dragData = {
                    selectedSlide,
                    startX: touch.clientX,
                    startY: touch.clientY,
                    startLeft: selectedSlide.x,
                    startTop: selectedSlide.y,
                };
            } else {
                this.dragData = {
                    selectedSlide,
                    startX: event.clientX,
                    startY: event.clientY,
                    startLeft: selectedSlide.x,
                    startTop: selectedSlide.y,
                };
            }
            this.dragging = true;
        },

        onDragging(selectedSlide, event) {
            if (this.dragging && this.dragData && this.dragData.selectedSlide === selectedSlide) {
                if (event.type === 'touchmove') {
                    const touch = event.touches[0]; // Get the first touch
                    const deltaX = touch.clientX - this.dragData.startX;
                    const deltaY = touch.clientY - this.dragData.startY;
                    selectedSlide.x = this.dragData.startLeft + deltaX;
                    selectedSlide.y = this.dragData.startTop + deltaY;
                } else {
                    const deltaX = event.clientX - this.dragData.startX;
                    const deltaY = event.clientY - this.dragData.startY;
                    selectedSlide.x = this.dragData.startLeft + deltaX;
                    selectedSlide.y = this.dragData.startTop + deltaY;
                }
            }
        },

        stopDragging() {
            this.dragging = false;
            this.dragData = null;
        },


        startDragging1(e) {
            e.preventDefault();
            this.dragging = true;
        },


        onDrag(e) {
            if (this.dragging) {
                const imgRect = this.$refs.html2canvas.getBoundingClientRect();
                const newX = e.type === 'touchmove' ? e.touches[0].clientX - imgRect.left : e.clientX - imgRect.left;
                const newY = e.type === 'touchmove' ? e.touches[0].clientY - imgRect.top : e.clientY - imgRect.top;

                if (this.dragData && this.dragData.selectedSlide) {
                    const selectedSlide = this.dragData.selectedSlide;
                    selectedSlide.x = Math.max(0, Math.min(newX, imgRect.width));
                    selectedSlide.y = Math.max(0, Math.min(newY, imgRect.height));
                } else {
                    this.textPosition.x = Math.max(0, Math.min(newX, imgRect.width));
                    this.textPosition.y = Math.max(0, Math.min(newY, imgRect.height));
                }
            }
        },

        stopDragging1() {
            this.dragging = false;
        },
        //-------------------圖示&文字拖拉結束------------------
        //選擇金額
        updateGiftCardAmount(amount) {
            this.selectedGiftCardAmount = amount;
        },
        downloadCanvas() {
            this.saveCapture();
            this.nextStep();
        },
        saveCapture() {
            html2canvas(this.$el.querySelector("#capture")).then((canvas) => {
                // console.log(canvas.toDataURL("image/png"));
                // const imageURL = canvas.toDataURL("image/png");
                const imageURL = canvas.toDataURL("image/jepg");
                console.log(`jepgLen:${imageURL.length}`);
                this.customImageURL = imageURL; // Set the customImageURL to the generated image URL
                // this.download(imageURL);
            });
        },
        download(url) {
            let a = document.createElement("a");
            a.style.display = "none";
            a.href = url;
            let uniqFileName = `gift_${Date.now()}`

            a.download = `${uniqFileName}.png`;
            console.log('download');
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        },
    },
    mounted() {
        this.getGiftcardData()
    },


},

);

</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/giftcard_progress.scss";
</style>
