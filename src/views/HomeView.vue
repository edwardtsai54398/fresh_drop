<template>
    <div class="container index_container">
        <!-- banner滑卡區 -->
        <section class="container_index">
            <div class="decorate_index">
                <div class="index_banner_slider">
                    <div class="decorate_day">
                        <img src="../assets/images/index/index_happy.png" alt="" />
                    </div>
                    <!-- 字左 -->
                    <div class="index_text">
                        <div>
                            <p>每日命定料理！</p>
                            <br />
                            <p>左右滑動找到屬於你的菜</p>
                        </div>
                        <div class="index_carrot pic">
                            <img src="../assets/images/index/index_decorate_carrot.png" alt="" />
                        </div>
                    </div>
                </div>
                <!-- 中間滑卡 -->
                <div class="index_index_banner_swiper">
                    <!-- 下一張按鈕 -->
                    <button class="btn_circle btn_flat">NEXT►</button>
                    <swiper :effect="'cards'" :grabCursor="true" :modules="modules" class="mySwiper">
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/1tomaot_egg.jpg" alt="" />
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/2creamy_beer_clam.jpg" alt="" />
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/3basil_eggplant.jpg" alt="" />
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/4grill_clam.jpg" alt="" />
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/5mapo_tofu.jpg" alt="" />
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/2creamy_beer_clam.jpg" alt="" />
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/23thai_hot_sour_soup.jpg" alt="" />
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/31vietnam_beef_salad.jpg" alt="" />
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="swiper_pic">
                                <img src="../assets/images/product/23thai_hot_sour_soup.jpg" alt="" />
                            </div>
                        </swiper-slide>
                    </swiper>
                    <button class="index_btn_l">更多食譜</button>
                </div>
                <!-- 字右 -->
                <div class="index_food_title">
                    <p>清爽無負擔</p>
                    <div class="line">
                        <span>希臘烤羊肉</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- 水果滑動區 -->
    <HomeIngrid />
    <!--  小農輪播區-->
    <section class="framer">
        <p>｜小農介紹｜</p>
        <Carousel v-bind="settings" :breakpoints="breakpoints" :wrap-around="true">
            <Slide v-for="item in farmerImg" :key="item">
                <div class="index_farmer_pic">
                    <img :src="item" alt="" />
                </div>
            </Slide>
            <template #addons>
                <Navigation />
            </template>
        </Carousel>
    </section>

    <!-- 訂購流程 -->
    <HomeOrder />

    <!-- 訂閱方案 -->
    <section class="index_subscription">
        <p>｜訂購流程｜</p>
        <div class="index_menu">
            <h3>1.一次配送幾餐?</h3>
        </div>
        <div class="index_8drop">
            <div class="index_drop">
                <h4>8 DROP</h4>
            </div>

            <div class="index_drop_box">
                <div class="index_drop_pic">
                    <img src="../assets/images/index/imdex_box.png" alt="" />
                </div>
                <div class="index_money">
                    <h4>原價1600元</h4>
                    <div class="sale_text">
                        <h4>特價1220元</h4>
                    </div>
                    <div class="sale_menu_text">
                        <h4>(一餐省下40元)</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="index_8drop">
            <div class="index_drop">
                <h4>8 DROP</h4>
            </div>

            <div class="index_drop_box">
                <div class="index_drop_pic">
                    <img src="../assets/images/index/imdex_box.png" alt="" />
                </div>
                <div class="index_money">
                    <h4>原價1600元</h4>
                    <div class="sale_text">
                        <h4>特價1220元</h4>
                    </div>
                    <div class="aa">
                        <h4>(一餐省下40元)</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="index_8drop">
            <div class="index_drop">
                <h4>8 DROP</h4>
            </div>
            <div class="index_drop_box">
                <div class="index_drop_pic">
                    <img src="../assets/images/index/imdex_box.png" alt="" />
                </div>
                <div class="index_money">
                    <h4>原價1600元</h4>
                    <div class="sale_text">
                        <h4>特價1220元</h4>
                    </div>
                    <div class="aa">
                        <h4>(一餐省下40元)</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="index_one">
            <h3>2.隔多久配送一次?</h3>
        </div>
        <div class="index_button">
            <div class="index_button_week">
                <div class="index_btn_l_button">
                    <div class="text_number">2</div>
                    周
                </div>
            </div>
            <div class="index_button_week">
                <div class="index_btn_l_button">
                    <div class="text_number">2</div>
                    周
                </div>
            </div>
            <div class="index_button_week">
                <div class="index_btn_l_button">
                    <div class="text_number">2</div>
                    周
                </div>
            </div>
        </div>
        <div class="index_illustrate">
            <h3>
                從第二次訂購開始，您可以選擇跳過、暫停或取消訂閱。我們沒有設定任何訂單次數的限制，也沒有與暫停或取消訂閱相關的違約金。
            </h3>
        </div>
        <div class="index_btn_l_more">更多食譜</div>
    </section>
</template>
<script>
import HomeIngrid from './home/HomeIngrid.vue';

export default {
    name: 'HomeView',
    components: {
        HomeIngrid,
    },

    data() {
        return {};
    },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/home.scss";
</style> 



