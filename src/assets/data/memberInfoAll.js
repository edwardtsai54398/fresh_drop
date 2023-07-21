import orderHistory from '@/assets/data/orderHistory.js'
import memberShare from '@/assets/data/memberShare.js'
const F2ERefugee = {
    id: 12348765,
    name: '高小龜',
    phone: '0952-099091',
    email: 'freshdrop@gmail.com',
    birth: '83-05-24',
    avatarImg: require('@/assets/images/member/71BbTEYQhgL.jpg'),
    // voucherRemain: '800',
    address: '桃園市中壢區復興路86號8樓',
    giftHistory: [
        {
          img: require('@/assets/images/gift/giftcard2.png'),
          status: 1,
          num: 12349876,
          remain: 800,
          money:1000,
          buyDate: '2023-06-12',

        },
    ],
    orderHistory,
    memberShare
}

export default F2ERefugee