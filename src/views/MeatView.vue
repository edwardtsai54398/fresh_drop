<template>
    <section class="meat_container">
        <div class="meatPage_title">
            <h4>｜安心肉品｜</h4>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box">
                <div class="chicken_ill pic">
                    <img :src="chicken.img2" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ chicken.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="pic">
                        <img :src="chicken.img" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ chicken.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ chicken.description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box">
                <div class="bg_top pic">
                    <img :src="bg.img" alt="">
                </div>
                <div class="pork_ill pic">
                    <img :src="pork.img2" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ pork.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="pic">
                        <img :src="pork.img" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ pork.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ pork.description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box">
                <div class="cow_ill pic">
                    <img :src="cow.img2" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ cow.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="pic">
                        <img :src="cow.img" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ cow.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ cow.description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box">
                <div class="goat_ill pic">
                    <img :src="goat.img2" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ goat.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="pic">
                        <img :src="goat.img" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ goat.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ goat.description }}</p>
                    </div>
                </div>
                <div class="bg_bottom pic">
                    <img :src="bg.img" alt="">
                </div>
            </div>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box">
                <div class="fish_ill pic">
                    <img :src="seafood.img2" alt="">
                </div>
                <div class="shrimp_ill pic">
                    <img :src="seafood.img3" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ seafood.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="pic">
                        <img :src="seafood.img" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ seafood.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ seafood.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: 'MeatContainer',
    data() {
        return {
            chicken: {
                title: '雞肉',
                img: require('@/assets/images/source/ck01_m.png'),
                img2: require('@/assets/images/source/ck05.png'),
                farmer: '好棒雞畜產',
                description:
                    '嚴選優質肉品，秉持著品質優良、衛生安全、營養價值等多重特性，研發高品質生鮮食品，謹慎為消費者把關。優質的經營服務團隊一直不斷的成長與茁壯，更採用最新穎的設備，縮短作業流程，分切、包裝、冷藏、運輸一元化，促進肉品產銷現代化，並搭配低溫冷藏車配送，以達到品質安全與衛生。',
            },
            pork: {
                title: '豬肉',
                img: require('@/assets/images/source/p01_m.png'),
                img2: require('@/assets/images/source/p05.png'),
                farmer: '快樂陽光豬牧場',
                description:
                    '臨中央山脈山麓及濁水溪旁，四周環境綠意盎然氣候宜人，以現代化的管理與飼養，妥善控管養殖密度及提供自然的生長環境，增加日照面積及保持環境通風，嚴格執行統進統出的批次生產管理，讓豬隻在友善、乾淨的環境內生長。',
            },
            cow: {
                title: '牛肉',
                img: require('@/assets/images/source/cw01_m.png'),
                img2: require('@/assets/images/source/cw05.png'),
                farmer: '好壯壯安心牛牧場',
                description:
                    '全國唯一通過CAS國家認證和產銷履歷雙驗證的品牌，從牧場生產、肉品分切場至銷售「一條龍」的標準作業，為消費者提供可追溯產品的生產管道。分切衛生嚴格管控，完整冷鏈技術保鮮，以「品質第一」為考量，堅持牛隻屠宰前不灌水、不使用生長激素、不使用瘦肉精，貫徹「新鮮、安心、美味」的生產理念。',
            },
            goat: {
                title: '羊肉',
                img: require('@/assets/images/source/gt01_m.png'),
                img2: require('@/assets/images/source/gt05.png'),
                farmer: '活力跳跳羊牧場',
                description:
                    '我們致力於提供健康、天然的食品，同時尊重動物福利和環境可持續性。我們的羊肉是經過精心挑選和處理的，以確保其品質和口感。遵守食品安全和衛生標準，堅持使用天然飼料，不添加任何人工激素或抗生素，從而提供給您最純淨、健康的羊肉產品。',
            },
            seafood: {
                title: '海鮮',
                img: require('@/assets/images/source/sf01_m.png'),
                img2: require('@/assets/images/source/sf05.png'),
                img3: require('@/assets/images/source/sf06.png'),
                farmer: '潮鮮養殖場',
                description:
                    '我們大幅降低養殖密度，不用增肥飼料，尤其在收成期間，絕不使用電擊方式，我們在半夜用傳統的流刺網捕撈，避免驚嚇到虱目魚而影響口感。從事友善養殖，所背負的風險與成本遠遠高於一般漁民，但是唯有這樣，才能真正提升養殖漁業的價值，也才能帶給消費者最安心最有保障的商品。',
            },
            bg: {
                img: require('@/assets/images/icon_bg/bg_yellow.svg'),
            }
        };
    },
    methods: {}
}
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/meat.scss";
</style>