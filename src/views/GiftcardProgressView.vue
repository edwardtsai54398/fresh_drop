<template>
    <div class="bgc">
    <div class="giftcard_progress_container">
        <!-- 步驟條 -->
        <div class="root">
            <div class="progressbar-container">
                <ul class="progressbar">
                    <li @click=changeStep(1) :class="{ active: step >= 1 }">收禮人</li>
                    <li @click=changeStep(2) :class="{ active: step >= 2 }">樣式</li>
                    <li @click=changeStep(3) :class="{ active: step >= 3 }">客製</li>
                    <li @click=changeStep(4) :class="{ active: step >= 4 }">金額</li>
                    <li @click=changeStep(5) :class="{ active: step >= 5 }">完成</li>
                </ul>
            </div>
        </div>
        <form>
            <!-- step 1 -->
            <section v-if="step == 1" class="form-container">
                <h5>請選擇收禮對象</h5>
                <div class="to-button">
                    <button class="btn_xs" :class="{ inactive: isSelfClicked }" type="button"
                        @click="isOtherClicked = true, isSelfClicked = false">親友</button>
                    <button class="btn_xs" :class="{ inactive: isOtherClicked }" type="button"
                        @click="isSelfClicked = true, isOtherClicked = false, selfClicked()">自己</button>
                </div>
                <div class="recipient-input" v-if="isOtherClicked === true">
                    <label for="email">收禮人會員Email</label>
                    <input type="email" placeholder="請輸入收禮人會員信箱" v-model="recipient.email" id="email" />
                    <label for="text">收禮人姓名</label>
                    <input type="text" placeholder="請輸入收禮人姓名" v-model="recipient.name" id="text" />
                    <!-- <label for="date">寄送日期</label>
                    <input type="date" placeholder="" v-model="recipient.date" id="date" /> -->
                </div>

                <div v-if="showErrorMessage && isOtherClicked && (!recipient.email || !recipient.name)"
                    class="error-message">
                    <span v-if="!recipient.email">請輸入收禮人會員信箱<br></span>
                    <span v-if="!recipient.name">請輸入收禮人姓名</span>
                </div>
                <button @click="validateAndNext($event)" class="nextstep btn_s">下一步，挑選禮物卡</button>
            </section>

            <!-- step 2 -->
            <section v-if="step == 2" class="form-container">
                <h5>請選擇禮物卡樣式</h5>
                <div class="select-pic pic">
                    <img :src="uploadedImage || selectedPic" alt="">

                </div>
                <div class="piclist">
                    <carousel v-bind="settings" :breakpoints="breakpoints">
                        <slide v-for="slide in defaultPic" :key="slide">
                            <div class="giftcard_pic box" @click="selectPic(slide)">
                                <img :src="slide" alt="">
                            </div>
                        </slide>
                        <template #addons>
                            <navigation />
                            <pagination />
                        </template>
                    </carousel>
                </div>
                <div class="upload_button">
                    <!-- Use the input type="file" element to trigger the file selection dialog -->
                    <label for="fileInput" class="btn_xs">或上傳您的照片 <i class="fa-solid fa-camera"
                            style="color: #ffffff;"></i></label>
                    <input id="fileInput" type="file" ref="fileInput" style="display: none" @change="handleFileUpload">
                </div>
                <p style="font-size: 12px;">＊圖片格式應為.jpg、.gif或.png。
                    <br>＊檔案不得大於 1MB，小於 100K。
                </p>
                <button @click="nextStep" class="nextstep btn_s">下一步，客製禮物卡</button>
                <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
            </section>

            <!-- step 3 -->
            <section v-if="step == 3" class="form-container">

                <h5>客製您的禮物卡</h5>
                <div class="select-pic pic" ref="pic" @mousemove="onDrag" @touchmove="onDrag">
                    <!--@touchmove="onDrag" 拖拉有bug被我關掉了-->
                    <div style="position: relative;">
                        <!-- Image -->
                        <img :src="uploadedImage || selectedPic" alt="" @mousedown="startDragging1"
                            @touchmove="startDragging1" :style="{
                                cursor: dragging ? 'grabbing' : 'grab',
                            }">
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

                <div class="sticker-overlay" ref="stickerOverlay" v-if="selectedSticker" :style="{
                    backgroundImage: 'url(' + selectedSticker.src + ')',
                    width: selectedSticker.width + 'px',
                    height: selectedSticker.height + 'px',
                    transform: 'translate(' + selectedSticker.x + 'px, ' + selectedSticker.y + 'px)'
                }" @touchstart="startDragging" @mousedown="startDragging"></div>
                <!-- @mousedown="startDragging" 被我收起來了-->
                <div class="add-sticker">
                    <span>點擊添加圖案</span>
                    <div class="sticker-list">
                        <carousel v-bind="stickerSettings" :breakpoints="breakpoints">
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

                        <i class="fa-solid fa-arrow-turn-down fa-rotate-90" style="color: #1f8d61;"></i>
                    </div>
                    <input id="colorPicker" type="color" v-model="color">
                    <!-- <i class="fa-solid fa-palette" style="color:#1f8d61" @click="openColorPicker"></i> -->

                </div>


                <button @click="nextStep" class="nextstep btn_s">下一步，選擇禮物卡金額</button>
                <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>

            </section>

            <!-- step 4 -->
            <section v-if="step == 4" class="form-container">
                <h5>請選擇禮物卡金額</h5>
                <div class="giftcard-money-input">
                    <input type="number" id="giftcard-money" disabled :value="selectedGiftCardAmount">
                    <i class="fa-solid fa-dollar-sign" style="color: #CAE0C4;"></i>
                </div>
                <div class="giftcard-money-wrap">
                    <div v-for="(item, index) in giftcardMoney" :key="index" class="giftcard-money-button">
                        <button :id="'money-button-' + index" class="btn_flat" type="button"
                            @click="updateGiftCardAmount(item)">
                            <img src="../assets/images/icon_bg/price.svg" alt="">{{ item }}
                        </button>
                    </div>

                </div>

                <button @click="nextStep" class="nextstep btn_s">下一步</button>
                <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
            </section>

            <!-- step 5 -->
            <section v-if="step == 5" class="form-container">
                <div class="finished">
                    <i class="fa-solid fa-circle-check" style="color: #1f8d61;"></i>
                    <h5>完成！</h5>
                </div>
                <div class="giftcard-detail">
                    <div class="finished-pic select-pic pic">
                        <img :src="selectedPic" alt="">
                    </div>
                    <div class="finished-text" v-for="(item, index) in detailTitle" :key="index">
                        <div class="finished-title">
                            <span>{{ Object.keys(item)[0] }} </span>

                        </div>
                        <div class="finished-item">
                            <span v-if="Object.keys(item)[0] === '收禮人會員'">{{ recipient.email }}</span>
                            <span v-if="Object.keys(item)[0] === '收禮人姓名'">{{ recipient.name }}</span>
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

                <button class="nextstep btn_s"><router-link to="#" style="color:#fff">結帳</router-link></button>
                <button @click="previousStep" class="previousstep btn_flat btn_xs">上一步</button>
            </section>
        </form>

    </div>
</div>
</template>
<script>
import { defineComponent } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

export default defineComponent({
    name: 'Break-points',
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data() {
        return {
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
            step: 1,
            totalsteps: 5,
            isOtherClicked: true,
            isSelfClicked: false,
            showErrorMessage: false,
            recipient: {
                email: '',
                name: '',
            },
            detailTitle: [],
            uploadedImage: null,
            selectedPic: require('@/assets/images/gift/giftcard_defaultpic_001.svg'),
            defaultPic: [
                require('@/assets/images/gift/giftcard_defaultpic_001.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_002.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_003.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_004.svg'),
                require('@/assets/images/gift/giftcard_defaultpic_005.svg')
            ],
            selectedSticker: [],
            sticker: [
                require('@/assets/images/gift/openmoji_wrapped-gift.svg'),
                require('@/assets/images/gift/openmoji_flower.svg'),
                require('@/assets/images/gift/openmoji_birthday-cake.svg'),
                require('@/assets/images/gift/openmoji_ribbon.svg'),
                require('@/assets/images/gift/openmoji_sparkles.svg')
            ],
            giftcardMoney: [500, 800, 1000, 2000, 3000, 5000],
            text: "",            // 输入框中的文字
            textColor: "#000000", // 文字颜色，默认为黑色
            textPosition: {      // 文字位置
                x: 0,
                y: 0
            },
            dragging: false,     // 是否正在拖拽文字
            selectedGiftCardAmount: 500,

        }
    },
    methods: {
        selfClicked() {
            this.detailTitle = [];
            this.recipient.email = '';
            this.recipient.name = '';
        },
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
        nextStep() {
            this.step++;
        },
        previousStep() {
            this.step--;
        },
        changeStep(newStep) {
            this.step = newStep;
        },
        selectPic(pic) {
            this.uploadedImage = null;
            this.selectedPic = pic;
        },
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
        selectSticker(sticker) {

            this.selectedSticker = {
                src: sticker,
                x: 0,
                y: 40,
                width: 50,
                height: 50,
            };
        },
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
// .section.carousel{
//         padding: 100px 0;
//     }
</style>
