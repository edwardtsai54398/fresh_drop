<template>
    <div class="mask" :class="{ none: !isopen }" @click="modalAllClose"></div>
    <div class="login-modal" :class="{ open: isopen }">
        <modalClose @click="modalAllClose" />
        <!-- <router-view> -->
        <div class="login_container" style="visibility: visible">
            <div class="login_normal">
                <h4>會員登入</h4>
                <div class="login_input">
                    <div class="text_wrap">
                        <label for="login-email">Email</label>
                        <input type="email" placeholder="請輸入信箱" v-model="user.email" id="login-email" />
                    </div>
                    <div class="text_wrap">
                        <label for="login-password">密碼</label>
                        <input
                            type="password"
                            placeholder="請輸入密碼(6-12碼英數字混合)"
                            v-model="user.password"
                            id="login-password"
                        />
                    </div>
                    <p class="err_msg">{{ errMsg }}</p>
                    <div class="check_wrap">
                        <div class="check">
                            <input type="checkbox" id="check" />
                            <label for="check">記住我</label>
                        </div>
                        <a href="#" @click.prevent="forgotPswOpen = true">忘記密碼？</a>
                    </div>
                </div>
                <a class="btn_s login_btn" @click="login">登入</a>
                <div class="signup">
                    還不是會員？
                    <a href="#" @click.prevent="SignupOpen = true">註冊會員</a>
                </div>
            </div>
            <div class="login_api_wrap">
                <p>或用其他方式登入</p>
                <div class="login_api">
                    <div class="btn_api">
                        <img src="../assets/images/icon_bg/facebook.svg" alt="" />
                        <span>以FACEBOOK方式登入</span>
                    </div>
                    <div class="btn_api">
                        <img src="../assets/images/icon_bg/google.svg" alt="" />
                        <span>以GOOGLE方式登入</span>
                    </div>
                </div>
            </div>
        </div>
        <SignupModal :isSlidein="SignupOpen" @close="SignupOpen = false" />
        <VertifyModal :isSlidein="forgotPswOpen" @close="forgotPswOpen = false" />
    </div>
</template>
<script>
import modalClose from "@/components/modalClose.vue";
// import F2ERefugee from "@/assets/data/memberInfoAll.js";
import SignupModal from "@/components/SignupModal.vue";
import VertifyModal from "@/components/VertifyModal.vue";
// import axios from "axios";
export default {
    name: "Login-Modal",
    props: {
        isopen: Boolean,
    },
    components: {
        modalClose,
        SignupModal,
        VertifyModal,
    },
    data() {
        return {
            errMsg: '',
            user: {
                email: "",
                password: "",
            },
            // F2ERefugee,
            SignupOpen: false,
            forgotPswOpen: false,
            pswForgetOpen: false,
        };
    },
    methods: {
        login() {
            if (this.user.email !== "" && this.user.password !== "") {
                let url = `${this.$url}login.php`;
                let params = new URLSearchParams();
                params.append("email", this.user.email);
                params.append("password", this.user.password);
                this.axios.post(url, params).then((res) => {
                    console.log(res.data)
                    if (res.data == 0) {
                        this.errMsg = '*帳號密碼錯誤，請再試一次'
                    } else {
                        this.$store.commit("setUserData", res.data);
                        this.$emit("close");
                        this.user.email = ''
                        this.user.password = ''
                        this.errMsg = ''
                        // this.$router.push("/index");
                    }
                });
            } else if (this.user.email === "") {
                this.errMsg = '*請填寫E-mail'
            }else if (this.user.password === "") {
                this.errMsg = '*請填寫密碼'
            }
        },
        modalAllClose() {
            this.SignupOpen = false;
            this.$emit("close");
        },
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
.login-modal {
    display: none;
    position: fixed;
    z-index: 21;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    max-width: 400px;
    height: fit-content;
    margin: auto;
    border-radius: $m-br;
    overflow: hidden;
    background-color: $bg--;
    padding: $sp3 $sp4 $sp4;
    &.open {
        display: block;
    }

    h4 {
        text-align: center;
        margin: $sp3;
        font-size: $m-font;
    }
    .signup_container,
    .verify_container {
        background-color: $bg--;
        position: absolute;
        top: 48px;
        left: 100%;
        padding: 0 $sp4 $sp4;
        height: calc(100% - $sp6);
        width: 100%;
        transition: 0.3s;
        &.open {
            left: 0;
        }
        legend {
            text-align: center;
            margin-bottom: $sp3;
            font-size: $m-font;
        }
        .go_back {
            position: absolute;
            left: $sp3;
            top: 0px;
        }
    }
}
@import "@/assets/scss/layout/login.scss";
</style>
