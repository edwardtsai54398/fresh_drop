import { createStore } from 'vuex'

export default createStore({
    state: {
        isLogin: false,
        memberInfoAll: {},
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
        dishRecommand: []
    },
    getters: {
    },
    mutations: {
        setUserData(state, { userData }) {
            state.memberInfoAll = userData
            state.isLogin = true
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
        }
    },
    actions: {
        
        
    },
    modules: {
    }
})
