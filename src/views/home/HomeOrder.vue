<template>
    <section class="order">
        <div class="anchor" v-for="i in 5" :class="`anchor${i}`" :key="i"></div>
        <h6 class="order_title">｜ 訂購流程 ｜</h6>
        <div class="order_container container">
            <div class="green_line">
                <img src="@/assets/images/index/line_green.svg" alt="" />
            </div>
            <div class="order_pic">
                <img src="@/assets/images/about/about_step1.svg" alt="" />
                <img src="@/assets/images/about/about_step2.svg" alt="" />
                <img src="@/assets/images/about/about_step3.svg" alt="" />
                <img src="@/assets/images/about/about_step4.svg" alt="" />
                <img src="@/assets/images/about/about_step5.svg" alt="" />
            </div>
            <div class="order_subtitle_wrap">
                <div class="order_num">
                    <ol>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ol>
                </div>
                <div class="order_subtitle">
                    <h6>瀏覽菜色列表</h6>
                    <h6>選擇你喜愛的菜色</h6>
                    <h6>加入購物車</h6>
                    <h6>結帳與支付</h6>
                    <h6>詢問與配送</h6>
                </div>
            </div>
            <div class="order_dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <div class="order_text">
                <p>
                    點擊菜色選購頁面，可以使用分類列表或瀏覽不同的頁面找到喜愛的餐點。點擊餐點圖片進入詳細頁面，進一步了解食材來源及製作方法。
                </p>
                <p>
                    在菜色選購頁面，您可以選擇定期配送方案或單次品項。指定要配送的週期、購買的數量、或其他相關選項（如過敏原及不包含的食材）
                </p>
                <p>
                    定期配送方案，選擇一次想要幾份餐，以及多久配送一次，買越多省越多！<br />
                    一旦您選擇好菜色的數量，點擊「訂單確認」按鈕，就可以前往結帳頁面。
                </p>
                <p>
                    準備結帳。您需要填寫聯繫方式及送貨地址，並提供支付方式的相關資訊。填寫完畢後，請檢查訂單詳細內容並確保一切正確無誤，點擊「結帳」按鈕進入結帳系統支付。
                </p>
                <p>
                    等待物流配送至目的地的同時，您可以在會員中心查看歷史記錄，以及追蹤訂單狀態，讓您了解發貨情況和預計到達時間。<br />
                    最後，當你的訂單準備發貨時，我們將安排送貨到您提供的地址。您會收到商品的送貨通知，並在指定的時間內收到新鮮的食材包，依據內附的菜單步驟製作，即可完成美味佳餚。
                </p>
            </div>
            <div class="green_line">
                <img src="@/assets/images/index/line_green.svg" alt="" />
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: "HomeOrder",
    data() {
        return {};
    },
    mounted() {
        window.addEventListener("scroll", this.orderScrollAnimate);
    },
    methods: {
        orderScrollAnimate() {
            // const scrollY = window.scrollY
            const container = document.querySelector(".order_container");
            const ach1toBrows = document.querySelector(".anchor1").getBoundingClientRect().top;
            const ach2toBrows = document.querySelector(".anchor2").getBoundingClientRect().top;
            const ach3toBrows = document.querySelector(".anchor3").getBoundingClientRect().top;
            const ach4toBrows = document.querySelector(".anchor4").getBoundingClientRect().top;
            // const ach5toBrows = document.querySelector(".anchor5").getBoundingClientRect().top;
            if (ach1toBrows > 0) {
                container.classList.remove("ach1");
            }else if (ach1toBrows < 0 && ach2toBrows > 0) {
                container.classList.add("ach1");
                container.classList.remove("ach2");
            } else if (ach2toBrows < 0 && ach3toBrows > 0) {
                container.classList.add("ach2");
                container.classList.remove("ach1");
                container.classList.remove("ach3");
            } else if (ach3toBrows < 0 && ach4toBrows > 0) {
                container.classList.add("ach3");
                container.classList.remove("ach2");
                container.classList.remove("ach4");
            } else if (ach4toBrows < 0) {
                container.classList.add("ach4");
                container.classList.remove("ach3");
            }
        },
    },
    beforeUnmount() {
        window.removeEventListener("scroll", this.orderScrollAnimate);
    },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/home/homeOrder.scss";
</style>




