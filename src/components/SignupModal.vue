<template>
    <div class="mask" :class="{ none: !isopen }" @click="$emit('close')"></div>
    <div class="signup_container" :class="{ open: isopen }">
        <modalClose @click="$emit('close')" />
        <!-- <router-view> -->
        <div class="signup_normal">
            <h4>註冊會員</h4>
                <div class="signup_input">
                    <div class="text_wrap">
                        <label for="text">姓名</label>
                        <input type="text" placeholder="請輸入姓名" v-model="user.name" id="name" />
                    </div>
                    <div class="sex_wrap">
                        <label for="text">性別</label>
                        <div class="check">
                            <div class="man">
                                <input type="checkbox" id="check" />
                                <label for="check">男</label>
                            </div>
                            <div class="female">
                                <input type="checkbox" id="check" />
                                <label for="check">女</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="select_box">
                    <label for="">生日</label>
                    <div class="select_wrap">
                        <select name="year" id="">
                            <option value="">請選擇</option>
                            <option value=""></option>
                        </select>
                        <select name="month" id="">
                            <option value="">請選擇</option>
                            <option value=""></option>
                        </select>
                        <select name="day" id="">
                            <option value="">請選擇</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="text_wrap">
                    <label for="phone">手機號碼</label>
                    <input type="text" placeholder="請輸入手機號碼" v-model="user.phone" id="phone" />
                </div>
                <div class="text_wrap">
                    <label for="email">Email</label>
                    <input type="email" placeholder="請輸入信箱" v-model="user.email" id="email" />
                </div>
                <div class="text_wrap">
                    <label for="password">密碼</label>
                    <input type="password" placeholder="請輸入密碼(6-12碼英數字混合)" v-model="user.password" id="password" />
                </div>
                <div class="text_wrap">
                    <label for="password">確認密碼</label>
                    <input type="password" placeholder="請再次輸入密碼(6-12碼英數字混合)" v-model="user.password" id="password" />
                </div>
                <div class="text_wrap">
                    <label for="text">商品寄送地址</label>
                    <div class="address_wrap">
                        <input type="text" placeholder="城市" id="" />
                        <input type="text" placeholder="行政區" id="" />
                    </div>
                    <input type="text" placeholder="地址" id="" />
                </div>
            <div class="confirm_btn"><a class="btn_s" @click="confirm">確認</a></div>
        </div>

        <!-- </router-view> -->
    </div>
</template>
<script>
import modalClose from "@/components/modalClose.vue";

export default {
    name: "SignupModal",
    props: {
        isopen: Boolean,
    },
    components: {
        modalClose,
    },
    data() {
        return {
            user: {
                name: "",
                phone: "",
                email: "",
                password: "",
            },

        };
    },
    methods: {

    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/signup.scss";
// @import "@/assets/scss/page/signup.scss";
</style>