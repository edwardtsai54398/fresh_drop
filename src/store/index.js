import { createStore } from 'vuex'

export default createStore({
    state: {
        isLogin: false,
        memberInfoAll: {info:'',shop:'',giftcard:'',share:''},
        giftBuy: {
            name: '',
            img: '',
            money: 0
        },
        cartList: [[]],
        shopPlan: {
            plan: '',
            meal: 0,
            week: 1,
        },
        dishRecommand: [],
        productDetil: []
    },
    getters: {
    },
    mutations: {
        logOut(state) {
            console.log('logout');
            state.memberInfoAll = {info:'',shop:'',giftcard:'',share:''}
            state.isLogin = false
            sessionStorage.removeItem("cus_no")
        },
        
        stateCartList(state, cartlist) {
            state.cartList = cartlist
        },
        statePlan(state, planWrap) {
            state.shopPlan.plan = planWrap.plan
            state.shopPlan.meal = planWrap.meal
            state.shopPlan.week = planWrap.week
        },
        stateGiftBuy(state, giftWrap) {
            state.giftBuy.name = giftWrap.name
            state.giftBuy.img = giftWrap.img
            state.giftBuy.money = giftWrap.money
        },
        clearState(state, string) {
            if (string == 'cart') {
                state.cartList = [[]]
                state.shopPlan.plan = ''
                state.shopPlan.meal = 0
                state.shopPlan.week = 1
            } else if (string == 'gift') {
                state.giftBuy = {}
            }
        },
        setProductData(state, { userData }) {
            state.productDetil = userData
        },
        //後端資料
        setUserInfo(state, userInfo) {
            sessionStorage.setItem("cus_no", userInfo.cus_no);
            userInfo.cus_no = parseInt(userInfo.cus_no) + 1000
            state.memberInfoAll.info = userInfo
            state.isLogin = true
        },
        sendMemDetail(state, data) {
            state.memberInfoAll.shop = data[0]
            state.memberInfoAll.giftcard = data[1]
            state.memberInfoAll.share = data[2]
        }
    },
    actions: {


    },
    modules: {
    }
})
