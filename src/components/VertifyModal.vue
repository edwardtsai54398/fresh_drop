<template>
    <form class="verify_container" :class="{ open: isSlidein }" >
        <button class="go_back" @click.prevent="$emit('close');email=''" v-show="!vertifyShow">
            <font-awesome-icon icon="fa-solid fa-chevron-left" size="lg" />
        </button>
        <legend>忘記密碼</legend>
        <div class="email_container">
            <label for="vertify_email">E-mail</label>
            <input type="email" id="vertify_email" placeholder="請輸入信箱" v-model="email" />
            <p :class="{ show: !emailFilled }">*請輸入收取驗證碼的信箱</p>
            <div class="btn_s" @click="sendVertify">發送驗證信</div>
        </div>
        <div class="vertify_container" :class="{open:vertifyShow}">
            <label for="vertify_number">輸入驗證信中的驗證碼</label>
            <input type="phone" placeholder="請輸入驗證碼" v-model="user.number" id="vertify_number" />
            <p>
                *若未收到驗證信，請在稍後，或確認您填入的信箱是否為有效信箱。
            </p>
            <div class="vertify_btngroup">
                <div class="btn_s btn_flat" @click="vertifyShow=false">再次發送驗證信</div>
                <div class="btn_s" @click.prevent="submit">送出</div>
            </div>
        </div>
    </form>
</template>
<script>
export default {
    name: "VertifyModal",
    props: {
        isSlidein: Boolean,
    },
    data() {
        return {
            emailFilled: true,
            vertifyShow: false,
            email: "",
            user: {
                number: "",
            },
        };
    },
    methods: {
        sendVertify() {
            let validEmail = this.email.includes("@");
            console.log(`valid${validEmail}`);
            console.log(this.email);
            if (this.email === "" && !validEmail) {
                console.log('fail');
                this.emailFilled = false;
                return;
            } else {
                this.emailFilled = true;
                this.vertifyShow = true;

            }
        },
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/verify.scss";
</style>
