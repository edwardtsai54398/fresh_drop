import { createStore } from 'vuex'

export default createStore({
    state: {
        isLogin: false,
        memberInfoAll: {},
        giftBuy: {},
        cartList: [],
        dishRecommand: []
    },
    getters: {
    },
    mutations: {
        setUserData(state, { userData }) {
            state.memberInfoAll = userData
            state.isLogin = true
        }
    },
    actions: {
    },
    modules: {
    }
})
