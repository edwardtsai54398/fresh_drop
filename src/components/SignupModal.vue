<template>
    <form class="signup_container" :class="{ open: isSlidein }">
        <button class="go_back" @click.prevent="$emit('close')">
            <font-awesome-icon icon="fa-solid fa-chevron-left" size="lg"/>
        </button>
        <legend>註冊會員</legend>
        <div class="signup_input">
            <div class="text_wrap">
                <label for="sign-name">姓名</label>
                <input type="text" placeholder="請輸入姓名" v-model="user.name" id="sign-name" />
            </div>
            <div class="gender_wrap">
                <label for="text">性別</label>
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
            <label for="sign-phone">手機號碼</label>
            <input type="text" placeholder="請輸入手機號碼" v-model="user.phone" id="sign-phone" />
        </div>
        <div class="text_wrap">
            <label for="sign-email">Email</label>
            <input type="email" placeholder="請輸入信箱" v-model="user.email" id="sign-email" />
        </div>
        <div class="text_wrap">
            <label for="sign-password">密碼</label>
            <input type="password" placeholder="請輸入密碼(6-12碼英數字混合)" v-model="user.password" id="sign-password" />
        </div>
        <div class="text_wrap">
            <label for="sign-confirmPsw">確認密碼</label>
            <input type="password" placeholder="請再次輸入密碼(6-12碼英數字混合)" v-model="user.confirmPsw" id="sign-confirmPsw" />
        </div>
        <div class="text_wrap">
            <label for="">商品寄送地址</label>
            <div class="address_wrap">
                <select name="" id="sign-sent_city" class="city" @change="changeDistrict($event)" v-model="user.sendCity">
                    <option value="none" disabled selected>請選擇縣市</option>
                    <option v-for="city in twDistrict" :key="city.name" :value="city.name">
                        {{ city.name }}
                    </option>
                </select>
                <select name="" id="sign-sent_state" class="state" v-model="user.sendDistrict">
                    <option value="none" disabled selected>請選擇行政區</option>
                    <option v-for="district in selectCityDistrict" :key="district.name" :value="district.name">
                        {{ district.name }}
                    </option>
                </select>
            </div>
            <input type="text" placeholder="地址" id="sign-add" v-model="user.sendAdd"/>
        </div>
        <div class="submit_btn"><a class="btn_s" @click="submit">送出</a></div>
    </form>
</template>
<script>
import axios from "axios";
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
                password: "",
                confirmPsw: "",
                sendCity: "",
                sendDistrict: "",
                sendAdd: "",
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
        changeDistrict(e) {
            let selectValue = e.target.value;
            let selectCity = this.twDistrict.find((item) => {
                return item.name == selectValue;
            });
            this.selectCityDistrict = selectCity.districts;
        },
        getTwDistrict() {
            let url =
                "https://gist.githubusercontent.com/abc873693/2804e64324eaaf26515281710e1792df/raw/a1e1fc17d04b47c564bbd9dba0d59a6a325ec7c1/taiwan_districts.json";
            axios
                .get(url)
                .then((response) => {
                    if (response.status !== 200) {
                        alert("錯誤");
                        return;
                    }
                    this.twDistrict = response.data;
                })
                .catch((error) => {
                    console.log("發生錯誤:", error);
                });
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

        }
    },
    mounted() {
        this.getTwDistrict();
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
