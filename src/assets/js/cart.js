import store from '@/store/index.js'
import router from '@/router/index.js'
let tabActive = 1
let cartList = store.state.cartList

const isCartSelectDone = function (selectedOptionMeal) {
    let isSelectDone = cartList.every((week) => {
        let total = 0;
        week.forEach((item) => {
            total += item.amount;
        });
        return total >= selectedOptionMeal
    });
    return isSelectDone;
}



const payCheck = function(isCartSelectDone) {
    if (!isCartSelectDone) {
        alert("購物車未選完");
        return;
    } else {
        store.commit("stateCartList", cartList);
        
        router.push("/pay");
    }
}

export {tabActive, cartList, payCheck, isCartSelectDone}