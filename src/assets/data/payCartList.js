const multiWeekCartList = [
    [
        {
            name: "滑嫩番茄蛋",
            category: "主菜",
            amount: 1,
            img: require("@/assets/images/product/1tomaot_egg.jpg"),
        },
        {
            name: "泡椒炒鮮魚",
            category: "主菜",
            amount: 1,
            img: require("@/assets/images/product/7bell_pepper_fish.jpg"),
        },
        {
            name: "法國紅酒燉雞",
            category: "主菜",
            amount: 1,
            img: require("@/assets/images/product/8Coqauvin.jpg"),
        },
        {
            name: "阿根廷燉牛肉",
            category: "主菜",
            amount: 1,
            img: require("@/assets/images/product/9Argentinian_beef_stew.jpg"),
        },
    ],
    [
        {
            name: "印度瑪撒拉薯仔沙拉",
            category: "沙拉",
            amount: 2,
            img: require("@/assets/images/product/28masal_potato_salad.jpg"),
        },
        {
            name: "泰式生菜包",
            category: "沙拉",
            amount: 1,
            img: require("@/assets/images/product/26lettuce_wrap.jpg"),
        },
        {
            name: "越南河粉湯",
            category: "主菜",
            amount: 1,
            img: require("@/assets/images/product/14Vietnamese_noodles.jpg"),
        },
    ],
    [
        {
            name: "墨西哥辣味雞肉湯",
            category: "湯品",
            amount: 1,
            img: require("@/assets/images/product/22mexico_spicy_chickn_soup.jpg"),
        },
        {
            name: "越南河粉湯",
            category: "主菜",
            amount: 1,
            img: require("@/assets/images/product/14Vietnamese_noodles.jpg"),
        },
        {
            name: "泰式酸辣湯",
            category: "湯品",
            amount: 2,
            img: require("@/assets/images/product/23thai_hot_sour_soup.jpg"),
        },
    ],
]

const singleCartList = [
    [
            {
                name: "墨西哥辣味雞肉湯",
                category: "湯品",
                amount: 1,
                img: require("@/assets/images/product/22mexico_spicy_chickn_soup.jpg"),
            },
            {
                name: "越南河粉湯",
                category: "主菜",
                amount: 1,
                img: require("@/assets/images/product/14Vietnamese_noodles.jpg"),
            },
            {
                name: "泰式酸辣湯",
                category: "湯品",
                amount: 2,
                img: require("@/assets/images/product/23thai_hot_sour_soup.jpg"),
            },
        ],
];
const giftCart = {
    img: require('@/assets/images/gift/giftcard1.png'),
    type: '客製',
    sendTo: '吳雅婷',
    money: 800
}

export {multiWeekCartList, singleCartList, giftCart}