<template>
    <div class="mask" :class="{ none: !isopen }" @click="$emit('close')"></div>
    <div class="login-container" :class="{ open: isopen }">
        <modalClose @click="$emit('close')" />
        <!-- <router-view> -->
        <div class="login_normal">
            <h4>會員登入</h4>
            <div class="login_input">
                <div class="text_wrap">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        placeholder="請輸入信箱"
                        v-model="user.email"
                        id="email"
                    />
                </div>
                <div class="text_wrap">
                    <label for="password">密碼</label>
                    <input
                        type="password"
                        placeholder="請輸入密碼(6-12碼英數字混合)"
                        v-model="user.password"
                        id="password"
                    />
                </div>
                <div class="check_wrap">
                    <div class="check">
                        <input type="checkbox" id="check" />
                        <label for="check">記住我</label>
                    </div>
                    <a href="#">忘記密碼？</a>
                </div>
            </div>
            <a class="btn_s login_btn" @click="login">登入</a>
            <div class="signup">還不是會員？<a href="#">註冊會員</a></div>
        </div>
        <div class="login_api_wrap">
            <p>或用其他方式登入</p>
            <div class="login_api">
                <a href="#" class="btn"
                    ><img src="../assets/images/icon_bg/facebook.png" alt=""
                /></a>
                <a href="#" class="btn"
                    ><img src="../assets/images/icon_bg/google.png" alt=""
                /></a>
            </div>
        </div>
        <!-- </router-view> -->
    </div>
</template>
<script>
import modalClose from "@/components/modalClose.vue";
import F2ERefugee from "@/assets/data/memberInfoAll.js";
export default {
    name: "Login-Modal",
    props: {
        isopen: Boolean,
    },
    components: {
        modalClose,
    },
    data() {
        return {
            user: {
                email: "",
                password: "",
            },
            F2ERefugee,
        };
    },
    methods: {
        login() {
            if (this.user.email === "test" && this.user.password === "test") {
                alert("登入成功");
                this.$emit("close");
                //這裡應該用api抓會員資料??
                this.$store.commit({
                    type: "setUserData",
                    userData: this.F2ERefugee,
                });
                this.$router.push("/");
            } else {
                alert("帳號或密碼錯誤，請再試一次");
            }
        },
    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/login.scss";
</style>
