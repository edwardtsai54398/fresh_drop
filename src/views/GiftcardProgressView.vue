<template>
    <div class="bgc">
        <div class="giftcard_progress_container">
            <!-- 步驟條 -->
            <div class="root">
                <div class="progressbar-container">
                    <!-- 手機版 -->
                    <ul class="progressbar">
                        <li
                            @click=changeStep(1)
                            :class="{ active: step >= 1 }"
                        >收禮人</li>
                        <li
                            @click=changeStep(2)
                            :class="{ active: step >= 2 }"
                        >樣式</li>
                        <li
                            @click=changeStep(3)
                            :class="{ active: step >= 3 }"
                        >客製</li>
                        <li
                            @click=changeStep(4)
                            :class="{ active: step >= 4 }"
                        >金額</li>
                        <li
                            @click=changeStep(5)
                            :class="{ active: step >= 5 }"
                        >完成</li>
                    </ul>
                    <!-- 768以上版 -->
                    <ul
                        id="progressbar"
                        class="progressbar"
                    >
                        <li
                            @click=changeStep(1)
                            :class="{ active: step >= 1 }"
                        >選擇收禮人</li>
                        <li
                            @click=changeStep(2)
                            :class="{ active: step >= 2 }"
                        >選擇樣式</li>
                        <li
                            @click=changeStep(3)
                            :class="{ active: step >= 3 }"
                        >客製禮物卡</li>
                        <li
                            @click=changeStep(4)
                            :class="{ active: step >= 4 }"
                        >選擇金額</li>
                        <li
                            @click=changeStep(5)
                            :class="{ active: step >= 5 }"
                        >完成</li>
                    </ul>
                </div>
            </div>
            <form>
                <!-- step 1 -->
                <section
                    v-if="step == 1"
                    class="form-container"
                >
                    <div class="decoration-tomato pic">
                        <img
                            src="../assets/images/source/tomato.png"
                            alt=""
                        >
                    </div>
                    <div class="decoration-carrot pic">
                        <img
                            src="../assets/images/source/carrot.png"
                            alt=""
                        >
                    </div>

                    <h5>請選擇收禮對象</h5>
                    <!-- 選送親友或自己按鈕 -->
                    <div class="to-button">
                        <button
                            class="btn_xs"
                            :class="{ inactive: isSelfClicked }"
                            type="button"
                            @click="isOtherClicked = true, isSelfClicked = false"
                        >親友</button>
                        <button
                            class="btn_xs"
                            :class="{ inactive: isOtherClicked }"
                            type="button"
                            @click="isSelfClicked = true, isOtherClicked = false, selfClicked()"
                        >自己</button>
                    </div>
                    <!-- 送親友才出現輸入框 -->
                    <div
                        class="recipient-input"
                        v-if="isOtherClicked === true"
                    >
                        <label for="email">收禮人會員Email</label>
                        <input
                            type="email"
                            placeholder="請輸入收禮人會員信箱"
                            v-model="recipient.email"
                            id="email"
                        />
                        <label for="text">收禮人姓名</label>
                        <input
                            type="text"
                            placeholder="請輸入收禮人姓名"
                            v-model="recipient.name"
                            id="text"
                        />
                    </div>
                    <!-- 輸入框是空的跳錯誤訊息 -->
                    <div
                        v-if="showErrorMessage && isOtherClicked && (!recipient.email || !recipient.name)"
                        class="error-message"
                    >
                        <span v-if="!recipient.email">請輸入收禮人會員信箱<br></span>
                        <span v-if="!recipient.name">請輸入收禮人姓名</span>
                    </div>
                    <button
                        @click="validateAndNext($event)"
                        class="nextstep btn_s"
                    >下一步，挑選禮物卡</button>
                </section>

                <!-- step 2 -->
                <section
                    v-if="step == 2"
                    class="form-container"
                >
                    <!-- 桌機板蔬果裝飾 -->
                    <div class="decoration-tomato pic">
                        <img
                            src="../assets/images/source/tomato.png"
                            alt=""
                        >
                    </div>
                    <div class="decoration-carrot pic">
                        <img
                            src="../assets/images/source/carrot.png"
                            alt=""
                        >
                    </div>

                    <h5>請選擇禮物卡樣式</h5>
                    <!-- 大圖顯示上傳的圖片或是選擇的預設圖片 -->
                    <div class="select-pic pic">
                        <img
                            :src="uploadedImage || selectedPic"
                            alt=""
                        >
                    </div>
                    <!-- 預設圖清單(輪播) -->
                    <div class="piclist">
                        <carousel
                            v-bind="settings"
                            :breakpoints="breakpoints"
                        >
                            <slide
                                v-for="slide in defaultPic"
                                :key="slide"
                            >
                                <div
                                    class="giftcard_pic box"
                                    @click="selectPic(slide)"
                                >
                                    <img
                                        :src="slide"
                                        alt=""
                                    >
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
                        <label
                            for="fileInput"
                            class="btn_xs"
                        >或上傳您的照片

                            <font-awesome-icon
                                icon="fa-solid fa-camera"
                                style="color: #ffffff; "
                            />

                        </label>
                        <input
                            id="fileInput"
                            type="file"
                            ref="fileInput"
                            style="display: none"
                            @change="handleFileUpload"
                        >
                    </div>

                    <p style="font-size: 12px;">＊圖片格式應為.jpg、.gif或.png。
                        <br>＊檔案不得大於 1MB，小於 100K。
                    </p>

                    <button
                        @click="nextStep"
                        class="nextstep btn_s"
                    >下一步，客製禮物卡</button>
                    <button
                        @click="previousStep"
                        class="previousstep btn_flat btn_xs"
                    >上一步</button>
                </section>

                <!-- step 3 -->
                <section
                    v-if="step == 3"
                    class="form-container"
                >
                    <!-- 桌機板蔬果裝飾 -->
                    <div class="decoration-tomato pic">
                        <img
                            src="../assets/images/source/tomato.png"
                            alt=""
                        >
                    </div>
                    <div class="decoration-carrot pic">
                        <img
                            src="../assets/images/source/carrot.png"
                            alt=""
                        >
                    </div>

                    <h5>客製您的禮物卡</h5>

                    <!-- 拖拉功能待修改 -->
                    <div
                        class="select-pic pic"
                        ref="pic"
                        @mousemove="onDrag"
                        @touchmove="onDrag"
                    >

                        <div style="position: relative;">
                            <!-- Image -->
                            <img
                                :src="uploadedImage || selectedPic"
                                alt=""
                                @mousedown="startDragging1"
                                @touchmove="startDragging1"
                                :style="{
                                    cursor: dragging ? 'grabbing' : 'grab',
                                }"
                            >
                            <!-- Text -->
                            <div :style="{
                                position: 'absolute',
                                left: textPosition.x + 'px',
                                top: textPosition.y + 'px',
                                background: 'rgba(255, 255, 255, 0.7)',
                                color: textColor,
                                padding: '4px 8px',
                                borderRadius: '4px',
                            }">{{ text }}</div>
                        </div>
                    </div>

                    <!-- 圖示拖拉 -->
                    <div
                        class="sticker-overlay"
                        ref="stickerOverlay"
                        v-if="selectedSticker"
                        :style="{
                        backgroundImage: 'url(' + selectedSticker.src + ')',
                        width: selectedSticker.width + 'px',
                        height: selectedSticker.height + 'px',
                        transform: 'translate(' + selectedSticker.x + 'px, ' + selectedSticker.y + 'px)'
                    }"
                        @touchstart="startDragging"
                        @mousedown="startDragging"
                    ></div>

                    <!--  圖示輪播 -->
                    <div class="add-sticker">
                        <span>點擊添加圖案</span>
                        <div class="sticker-list">
                            <carousel
                                v-bind="stickerSettings"
                                :breakpoints="stickerBreakpoints"
                            >
                                <slide
                                    v-for="slide in sticker"
                                    :key="slide"
                                >
                                    <div
                                        class="stickerBox"
                                        @click="selectSticker(slide)"
                                    >
                                        <img
                                            :src="slide"
                                            alt=""
                                        >
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
                            <input
                                v-model="text"
                                type="text"
                                placeholder="請輸入訊息"
                            />
                            <font-awesome-icon
                                icon="fa-solid fa-arrow-turn-down"
                                rotation=90
                                style="color: #1f8d61; position: absolute;
                                     top: 13px;
                                    right: 6px;"
                            />

                        </div>

                        <!-- 文字選取顏色功能待新增 -->
                        <input
                            id="colorPicker"
                            type="color"
                            v-model="color"
                        >

                    </div>

                    <button
                        @click="nextStep"
                        class="nextstep btn_s"
                    >下一步，選擇禮物卡金額</button>
                    <button
                        @click="previousStep"
                        class="previousstep btn_flat btn_xs"
                    >上一步</button>

                </section>

                <!-- step 4 -->
                <section
                    v-if="step == 4"
                    class="form-container"
                >
                    <!-- 桌機板蔬果裝飾 -->
                    <div class="decoration-tomato pic">
                        <img
                            src="../assets/images/source/tomato.png"
                            alt=""
                        >
                    </div>
                    <div class="decoration-carrot pic">
                        <img
                            src="../assets/images/source/carrot.png"
                            alt=""
                        >
                    </div>

                    <h5>請選擇禮物卡金額</h5>
                    <div class="giftcard-money-input">
                        <input
                            type="number"
                            id="giftcard-money"
                            disabled
                            :value="selectedGiftCardAmount"
                        >
                        <font-awesome-icon
                            icon="fa-solid fa-dollar-sign"
                            style="color: #1F8D61; font-size: 20px;
        position: absolute;
        top: 28%;
        left: 10%"
                        />
                    </div>
                    <div class="giftcard-money-wrap">
                        <div
                            v-for="(item, index) in giftcardMoney"
                            :key="index"
                            class="giftcard-money-button"
                        >
                            <button
                                :id="'money-button-' + index"
                                class="btn_flat"
                                type="button"
                                @click="updateGiftCardAmount(item)"
                            >
                                <img
                                    src="../assets/images/icon_bg/price.svg"
                                    alt=""
                                >{{ item }}
                            </button>
                        </div>

                    </div>

                    <button
                        @click="nextStep"
                        class="nextstep btn_s"
                    >下一步</button>
                    <button
                        @click="previousStep"
                        class="previousstep btn_flat btn_xs"
                    >上一步</button>
                </section>

                <!-- step 5 -->

                <section
                    v-if="step == 5"
                    class="form-container"
                >
                    <!-- 桌機板蔬果裝飾 -->
                    <div class="decoration-tomato pic">
                        <img
                            src="../assets/images/source/tomato.png"
                            alt=""
                        >
                    </div>
                    <div class="decoration-carrot pic">
                        <img
                            src="../assets/images/source/carrot.png"
                            alt=""
                        >
                    </div>

                    <div class="finished">
                        <font-awesome-icon
                            icon="fa-solid fa-circle-check"
                            style="color: #1F8D61; font-size: 70px; margin-bottom: 10px;"
                        />
                        <h5>完成！</h5>
                    </div>

                    <div class="giftcard-detail">
                        <!-- 待改使用者客製圖片 -->
                        <div class="finished-pic select-pic pic">
                            <img
                                :src="uploadedImage || selectedPic"
                                alt=""
                            >
                        </div>

                        <div class="text-wrap">

                            <div
                                class="finished-text"
                                v-for="(item, index) in detailTitle"
                                :key="index"
                            >
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

                    <button
                        class="nextstep btn_s"
                        @click="payCheck"
                    ><router-link
                            to="/pay"
                            style="color:#fff"
                        >結帳</router-link></button>
                    <button
                        @click="previousStep"
                        class="previousstep btn_flat btn_xs"
                    >上一步</button>
                </section>
            </form>

        </div>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';
// 輪播
export default defineComponent({
    name: 'Break-points',
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data() {
        return {

            step: 1,
            totalsteps: 5,

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
            defaultPic: [ // 樣式圖片
                require('@/assets/images/gift/giftcard_defaultpic_001.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_002.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_003.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_004.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_005.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_006.svg')
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
                700: {
                    itemsToShow: 3,
                    snapAlign: 'center',
                },
                // 1024 and up
                1024: {
                    itemsToShow: 3,
                    snapAlign: 'center',
                }
            },

            //Step 3
            selectedSticker: [], //使用者選取圖示
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


            //Step 4
            giftcardMoney: [500, 800, 1000, 2000, 3000, 5000], //金額按鈕
            selectedGiftCardAmount: 500, //預設金額500

            // Step 5
            detailTitle: [],


        }
    },
    methods: {
        payCheck() {
            if (!this.$store.state.isLogin) {
                alert('請先登入會員')
                return
            }
            //判斷結帳頁使否有商品未結帳(未做)
            this.$store.commit('stateGiftBuy', {
                name: this.recipient.name,
                img: '',
                money: this.selectedGiftCardAmount
            })
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

            this.step++;
        },

        //下一步
        nextStep() {
            this.step++;
        },

        //上一步
        previousStep() {
            this.step--;
        },

        //進度條切換步驟
        changeStep(newStep) {
            this.step = newStep;
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
            this.selectedPic = pic;
            const selectedPicElement = document.querySelector(`.piclist .giftcard_pic img[src="${pic}"]`);
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
        selectSticker(sticker) {

            this.selectedSticker = {
                src: sticker,
                x: 0,
                y: 40,
                width: 50,
                height: 50,
            };
        },


        //-------------------圖示&文字拖拉開始(待修正)------------------
        startDragging(event) {
            // Prevent default touch behavior
            event.preventDefault();

            // Get the initial mouse/touch position
            const x = event.pageX || (event.touches && event.touches[0].pageX);
            const y = event.pageY || (event.touches && event.touches[0].pageY);

            // Get the sticker overlay element using the ref
            const stickerOverlay = this.$refs.stickerOverlay;
            if (!stickerOverlay) {
                // Return if the sticker overlay is not found
                return;
            }

            // Calculate the initial position of the sticker relative to its position within the container
            const containerRect = this.$refs.pic.getBoundingClientRect();
            const stickerRect = stickerOverlay.getBoundingClientRect();
            const offsetX = x - containerRect.left;
            const offsetY = y - containerRect.top;

            // Set the initial position of the sticker
            this.selectedSticker.x = offsetX - stickerRect.width / 2;
            this.selectedSticker.y = offsetY - stickerRect.height / 2;

            // Add event listeners to handle dragging to the document
            document.addEventListener('mousemove', this.dragSticker);
            document.addEventListener('touchmove', this.dragSticker);
            document.addEventListener('mouseup', this.stopDragging);
            document.addEventListener('touchend', this.stopDragging);
        },

        dragSticker(event) {
            // Prevent default touch behavior
            event.preventDefault();

            // Get the sticker overlay element using the ref
            const stickerOverlay = this.$refs.stickerOverlay;
            if (!stickerOverlay) {
                // Return if the sticker overlay is not found
                return;
            }

            // Calculate the boundaries for the sticker's draggable area (within the container)
            const containerRect = this.$refs.pic.getBoundingClientRect();
            const stickerRect = stickerOverlay.getBoundingClientRect();

            const maxX = containerRect.width - stickerRect.width;
            const maxY = containerRect.height - stickerRect.height + 40;

            // Get the current mouse/touch position relative to the container
            const x = event.pageX || (event.touches && event.touches[0].pageX);
            const y = event.pageY || (event.touches && event.touches[0].pageY);
            const offsetX = x - containerRect.left;
            const offsetY = y - containerRect.top;

            // Calculate the new position for the sticker within the boundaries
            let newX = offsetX - stickerRect.width / 2;
            let newY = offsetY - stickerRect.height / 2;

            // Ensure the sticker stays within the boundaries
            newX = Math.max(0, Math.min(newX, maxX));
            newY = Math.max(40, Math.min(newY, maxY));

            // Update the position of the sticker
            this.selectedSticker.x = newX;
            this.selectedSticker.y = newY;
        },


        stopDragging() {
            // Remove the event listeners used for dragging
            document.removeEventListener('mousemove', this.dragSticker);
            document.removeEventListener('touchmove', this.dragSticker);
            document.removeEventListener('mouseup', this.stopDragging);
            document.removeEventListener('touchend', this.stopDragging);
        },
        startDragging1(e) {
            e.preventDefault();
            this.dragging = true;
        },
        onDrag(e) {
            if (!this.dragging) return;
            const imgRect = this.$refs.pic.getBoundingClientRect();

            // Calculate the new position for the text within the boundaries
            const newX = e.type === 'touchmove' ? e.touches[0].clientX - imgRect.left : e.clientX - imgRect.left;
            const newY = e.type === 'touchmove' ? e.touches[0].clientY - imgRect.top : e.clientY - imgRect.top;


            // Ensure the text stays within the boundaries of the image container

            this.textPosition.x = Math.max(0, Math.min(newX, imgRect.width));
            this.textPosition.y = Math.max(0, Math.min(newY, imgRect.height));
        },

        stopDragging1() {
            this.dragging = false;
        },
        //-------------------圖示&文字拖拉結束------------------

        //選擇金額
        updateGiftCardAmount(amount) {
            this.selectedGiftCardAmount = amount;
        },
    },

},

);

</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/giftcard_progress.scss";
</style>
