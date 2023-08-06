<template>
    <form class="signup_container" :class="{ open: isSlidein }">
        <button class="go_back" @click.prevent="$emit('close')">
            <font-awesome-icon icon="fa-solid fa-chevron-left" size="lg"/>
        </button>
        <legend>註冊會員</legend>
        <div class="signup_input">
            <div class="text_wrap">
                <label for="sign-name">姓名<span class="must_fill">*此欄位必填</span></label>
                <input type="text" placeholder="請輸入姓名" v-model="user.name" id="sign-name" name="sign-name" @blur="checkFilled(user.name, $event)"/>
            </div>
            <div class="gender_wrap">
                <label for="sign-gender">性別<span class="must_fill">*此欄位必填</span></label>
                <div class="check">
                    <div class="man">
                        <input type="radio" name="gender" value="男" v-model="user.gender"/>
                        <label for="check">男</label>
                    </div>
                    <div class="female">
                        <input type="radio" name="gender" value="男" v-model="user.gender"/>
                        <label for="check">女</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="select_box">
            <label for="">生日</label>
            <div class="select_wrap">
                <select v-model="selectedYear" name="year" id="birth_year" @change="updateDaysArr();concatDate()">
                    <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                </select>
                <select v-model="selectedMonth" name="month" id="birth_month" @change="updateDaysArr();concatDate()">
                    <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
                </select>
                <select v-model="selectedDay" name="day" id="birth_day" :value="selectedDay" @change="concatDate()">
                    <option v-for="day in days" :key="day" :value="day">{{ day }}</option>
                </select>
            </div>
        </div>
        <div class="text_wrap">
            <label for="sign-phone">手機號碼<span class="must_fill">*此欄位必填</span></label>
            <input type="text" placeholder="請輸入手機號碼" v-model="user.phone" id="sign-phone" name="sign-phone" @blur="checkFilled(user.phone, $event)"/>
        </div>
        <div class="text_wrap">
            <label for="sign-email">Email<span class="must_fill">*此欄位必填</span></label>
            <input type="email" placeholder="請輸入信箱" v-model="user.email" id="sign-email" name="sign-email" @blur="checkFilled(user.email, $event)"/>
        </div>
        <div class="text_wrap">
            <label for="sign-psw">密碼<span class="must_fill">*此欄位必填</span></label>
            <input type="password" placeholder="請輸入密碼(6-12碼英數字混合)" v-model="user.psw" id="sign-psw" name="sign-psw" @blur="checkFilled(user.psw, $event)"/>
        </div>
        <div class="text_wrap">
            <label for="sign-confirmPsw">確認密碼<span class="must_fill">*此欄位必填</span></label>
            <input type="password" placeholder="請再次輸入密碼(6-12碼英數字混合)" v-model="user.confirmPsw" id="sign-confirmPsw" name="sign-confirmPsw"
            @blur="checkFilled(user.confirmPsw, $event)" @paste="(e)=>{ e.preventDefault()}"/>
        </div>
        <div class="text_wrap">
            <label for="sign-add">商品寄送地址<span class="must_fill">*此欄位必填</span></label>
            <input type="text" placeholder="地址" id="sign-add" name="sign-add"
            v-model="user.add" @blur="checkFilled(user.sendAdd, $event)"/>
        </div>
        <div class="submit_btn"><a class="btn_s" @click="submit">送出</a></div>
    </form>
</template>
<script>
export default {
    name: "SignupModal",
    props: {
        isSlidein: Boolean,
    },
    data() {
        return {
            user: {
                name: "",
                gender: "",
                birth:"",
                phone: "",
                email: "",
                psw: "",
                confirmPsw: "",
                add: "",
            },
            twDistrict: [],
            selectCityDistrict: [],
            years:[],
            months:[1,2,3,4,5,6,7,8,9,10,11,12],
            days: [],
            selectedYear:new Date().getFullYear(),
            selectedMonth:new Date().getMonth()+1,
            selectedDay: new Date().getDate(),
            
        };
    },
    methods: {
        checkFilled(val, e) {
            let DOMid = e.target.id
            let errMsg = document.querySelector(`[for=${DOMid}] span`)
            if (val == '') {
                errMsg.style.visibility = 'visible'
            } else {
                errMsg.style.visibility = 'hidden'
            }
        },
        changeDistrict(e) {
            let selectValue = e.target.value;
            let selectCity = this.twDistrict.find((item) => {
                return item.name == selectValue;
            });
            this.selectCityDistrict = selectCity.districts;
        },
        builtYearsArr() {
            const currentYear = new Date().getFullYear()
            for (let i = currentYear; i >= currentYear - 100; i--) {
                this.years.push(i)
            }
        },
        updateDaysArr() {
            this.days = []
            const daysInMonth = new Date(this.selectedYear, this.selectedMonth, 0).getDate()
            for (let i = 1; i <= daysInMonth; i++) {
                this.days.push(i)
            }
            if (this.selectedDay > daysInMonth) {
                this.selectedDay = daysInMonth
            }
        },
        concatDate() {
            this.user.birth = `${this.selectedYear}-${this.selectedMonth}-${this.selectedDay}`
        },
        submit() {
            let hasEmptyField = false;
            for (let key in this.user) {
                if (this.user[key] == '') {
                    let errMsg = document.querySelector(`[for="sign-${key}"] span`)
                    errMsg.style.visibility = 'visible'
                    hasEmptyField = true
                }
            }
            if (hasEmptyField) {
                return
            }
            if (this.user.psw !== this.user.confirmPsw) {
                alert('請再次確認密碼')
            } else {
                console.log('註冊成功');
            }
        }
    },
    mounted() {
        this.builtYearsArr();
        this.updateDaysArr();
        this.concatDate();
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/layout/signup.scss";
</style>
