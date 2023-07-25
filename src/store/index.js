import { createStore } from 'vuex'

export default createStore({
    state: {
        isLogin: false,
        memberInfoAll: {},
        giftBuy: {},
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
        }
    },
    actions: {
        
        
    },
    modules: {
    }
})
