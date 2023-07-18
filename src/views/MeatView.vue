<template>
    <section class="meat_container">
        <div class="meatPage_title">
            <h4>｜安心肉品｜</h4>
        </div>
        <div class="meat_btn">
            <div class="chicken btn" @click="scrollToSection('chickenSection')">雞肉</div>
            <div class="pork btn" @click="scrollToSection('porkSection')">豬肉</div>
            <div class="beef btn" @click="scrollToSection('beefSection')">牛肉</div>
            <div class="goat btn" @click="scrollToSection('goatSection')">羊肉</div>
            <div class="seafood btn" @click="scrollToSection('seafoodSection')">海鮮</div>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box_m">
                <div class="chicken_ill pic">
                    <img :src="chicken.img5" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ chicken.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="meat_img_mob pic">
                        <img :src="chicken.img_m" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ chicken.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ chicken.description }}</p>
                    </div>
                </div>
            </div>
            <section id="chickenSection">
                <div class="meat_card_box">
                    <!-- 四個角的圓形 -->
                    <!-- <div class="circle_box">
                        <div class="circle_lt"></div>
                        <div class="circle_rt"></div>
                        <div class="circle_lb"></div>
                        <div class="circle_rb"></div>
                    </div> -->
                    <div class="meat_title">
                        <h5>{{ chicken.title }}</h5>
                    </div>
                    <div class="chicken_ill pic">
                        <img :src="chicken.img5" alt="">
                    </div>
                    <div class="card_top">
                        <div class="meat_img pic">
                            <img :src="chicken.img" alt="">
                        </div>
                        <!-- 首圖底下背景 -->
                        <div class="meat_img_bg"></div>
                        <div class="card_text">
                            <div class="farmer_title">
                                <h3>{{ chicken.farmer }}</h3>
                            </div>
                            <div class="farmer_text">
                                <p>{{ chicken.description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card_bottom">
                        <div class="farmer_img_lf">
                            <img :src="chicken.img2" alt="">
                            <p>
                                <span>專業經驗 結合科技</span><br>
                                {{ chicken.farmerText1 }}
                            </p>
                        </div>
                        <div class="farmer_img_md">
                            <img :src="chicken.img3" alt="">
                            <p>
                                <span>精心培育 優質育種</span><br>
                                {{ chicken.farmerText2 }}
                            </p>
                        </div>
                        <div class="farmer_img_rg">
                            <img :src="chicken.img4" alt="">
                            <p>
                                <span>定期檢驗 嚴選優質肉品</span><br>
                                {{ chicken.farmerText3 }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="bg_img_t pic">
                <img :src="bg.img" alt="">
            </div>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box_m">
                <div class="bg_top pic">
                    <img :src="bg.img" alt="">
                </div>
                <div class="pork_ill pic">
                    <img :src="pork.img5" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ pork.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="meat_img_mob pic">
                        <img :src="pork.img_m" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ pork.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ pork.description }}</p>
                    </div>
                </div>
            </div>
            <section id="porkSection">
                <div class="meat_card_box">
                    <!-- 四個角的圓形 -->
                    <!-- <div class="circle_box">
                        <div class="circle_lt"></div>
                        <div class="circle_rt"></div>
                        <div class="circle_lb"></div>
                        <div class="circle_rb"></div>
                    </div> -->
                    <div class="meat_title">
                        <h5>{{ pork.title }}</h5>
                    </div>
                    <div class="pork_ill pic">
                        <img :src="pork.img5" alt="">
                    </div>
                    <div class="card_top">
                        <div class="card_text">
                            <div class="farmer_title">
                                <h3>{{ pork.farmer }}</h3>
                            </div>
                            <div class="farmer_text">
                                <p>{{ pork.description }}</p>
                            </div>
                        </div>
                        <div class="meat_img pic">
                            <img :src="pork.img" alt="">
                        </div>
                        <!-- 首圖底下背景 -->
                        <div class="meat_img_bg_r"></div>
                    </div>
                    <div class="card_bottom">
                        <div class="farmer_img_lf">
                            <img :src="pork.img2" alt="">
                            <p>
                                <span>產銷履歷畜牧場</span><br>
                                {{ pork.farmerText1 }}
                            </p>
                        </div>
                        <div class="farmer_img_md">
                            <img :src="pork.img3" alt="">
                            <p>
                                <span>食的營養 食的安心</span><br>
                                {{ pork.farmerText2 }}
                            </p>
                        </div>
                        <div class="farmer_img_rg">
                            <img :src="pork.img4" alt="">
                            <p>
                                <span>100%自營牧場 不委外加工</span><br>
                                {{ pork.farmerText3 }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box_m">
                <div class="beef_ill pic">
                    <img :src="beef.img5" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ beef.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="meat_img_mob pic">
                        <img :src="beef.img_m" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ beef.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ beef.description }}</p>
                    </div>
                </div>
            </div>
            <section id="beefSection">
                <div class="meat_card_box">
                    <!-- 四個角的圓形 -->
                    <!-- <div class="circle_box">
                        <div class="circle_lt"></div>
                        <div class="circle_rt"></div>
                        <div class="circle_lb"></div>
                        <div class="circle_rb"></div>
                    </div> -->
                    <div class="meat_title">
                        <h5>{{ beef.title }}</h5>
                    </div>
                    <div class="beef_ill pic">
                        <img :src="beef.img5" alt="">
                    </div>
                    <div class="card_top">
                        <div class="meat_img pic">
                            <img :src="beef.img" alt="">
                        </div>
                        <!-- 首圖底下背景 -->
                        <div class="meat_img_bg"></div>
                        <div class="card_text">
                            <div class="farmer_title">
                                <h3>{{ beef.farmer }}</h3>
                            </div>
                            <div class="farmer_text">
                                <p>{{ beef.description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card_bottom">
                        <div class="farmer_img_lf">
                            <img :src="beef.img2" alt="">
                            <p>
                                <span>完配飼料 在地農產</span><br>
                                {{ beef.farmerText1 }}
                            </p>
                        </div>
                        <div class="farmer_img_md">
                            <img :src="beef.img3" alt="">
                            <p>
                                <span>嚴格管理 快樂牧場</span><br>
                                {{ beef.farmerText2 }}
                            </p>
                        </div>
                        <div class="farmer_img_rg">
                            <img :src="beef.img4" alt="">
                            <p>
                                <span>新鮮衛生 嚴格品管</span><br>
                                {{ beef.farmerText3 }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box_m">
                <div class="goat_ill pic">
                    <img :src="goat.img5" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ goat.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="meat_img_mob pic">
                        <img :src="goat.img_m" alt="">
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
            <section id="goatSection">
                <div class="meat_card_box">
                    <!-- 四個角的圓形 -->
                    <!-- <div class="circle_box">
                        <div class="circle_lt"></div>
                        <div class="circle_rt"></div>
                        <div class="circle_lb"></div>
                        <div class="circle_rb"></div>
                    </div> -->
                    <div class="meat_title">
                        <h5>{{ goat.title }}</h5>
                    </div>
                    <div class="goat_ill pic">
                        <img :src="goat.img5" alt="">
                    </div>
                    <div class="card_top">
                        <div class="card_text">
                            <div class="farmer_title">
                                <h3>{{ goat.farmer }}</h3>
                            </div>
                            <div class="farmer_text">
                                <p>{{ goat.description }}</p>
                            </div>
                        </div>
                        <div class="meat_img pic">
                            <img :src="goat.img" alt="">
                        </div>
                        <!-- 首圖底下背景 -->
                        <div class="meat_img_bg_r"></div>
                    </div>
                    <div class="card_bottom">
                        <div class="farmer_img_lf">
                            <img :src="goat.img2" alt="">
                            <p>
                                <span>自種牧草 安心健康</span><br>
                                {{ goat.farmerText1 }}
                            </p>
                        </div>
                        <div class="farmer_img_md">
                            <img :src="goat.img3" alt="">
                            <p>
                                <span>整潔環境 舒適空間</span><br>
                                {{ goat.farmerText2 }}
                            </p>
                        </div>
                        <div class="farmer_img_rg">
                            <img :src="goat.img4" alt="">
                            <p>
                                <span>安心品質 健康天然</span><br>
                                {{ goat.farmerText3 }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="bg_img_b pic">
                <img :src="bg.img" alt="">
            </div>
        </div>
        <div class="meat_card_container">
            <div class="meat_card_box_m">
                <div class="fish_ill pic">
                    <img :src="seafood.img5" alt="">
                </div>
                <div class="shrimp_ill pic">
                    <img :src="seafood.img6" alt="">
                </div>
                <div class="meat_title">
                    <h5>{{ seafood.title }}</h5>
                </div>
                <div class="meat_card">
                    <div class="pmeat_img_mob pic">
                        <img :src="seafood.img_m" alt="">
                    </div>
                    <div class="farmer_title">
                        <h3>{{ seafood.farmer }}</h3>
                    </div>
                    <div class="farmer_text">
                        <p>{{ seafood.description }}</p>
                    </div>
                </div>
            </div>
            <section id="seafoodSection">
                <div class="meat_card_box">
                    <!-- 四個角的圓形 -->
                    <!-- <div class="circle_box">
                        <div class="circle_lt"></div>
                        <div class="circle_rt"></div>
                        <div class="circle_lb"></div>
                        <div class="circle_rb"></div>
                    </div> -->
                    <div class="meat_title">
                        <h5>{{ seafood.title }}</h5>
                    </div>
                    <div class="fish_ill pic">
                        <img :src="seafood.img5" alt="">
                    </div>
                    <div class="shrimp_ill pic">
                        <img :src="seafood.img6" alt="">
                    </div>
                    <div class="card_top">
                        <div class="meat_img pic">
                            <img :src="seafood.img" alt="">
                        </div>
                        <!-- 首圖底下背景 -->
                        <div class="meat_img_bg"></div>
                        <div class="card_text">
                            <div class="farmer_title">
                                <h3>{{ seafood.farmer }}</h3>
                            </div>
                            <div class="farmer_text">
                                <p>{{ seafood.description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card_bottom">
                        <div class="farmer_img_lf">
                            <img :src="seafood.img2" alt="">
                            <p>
                                <span>友善養殖環境 自然共生</span><br>
                                {{ seafood.farmerText1 }}
                            </p>
                        </div>
                        <div class="farmer_img_md">
                            <img :src="seafood.img3" alt="">
                            <p>
                                <span>乾淨衛生 安心飼料</span><br>
                                {{ seafood.farmerText2 }}
                            </p>
                        </div>
                        <div class="farmer_img_rg">
                            <img :src="seafood.img4" alt="">
                            <p>
                                <span>新鮮營養 嚴格控管</span><br>
                                {{ seafood.farmerText3 }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</template>
<script>
export default {
    name: 'MeatContainer',
    data() {
        return {
            // example: [
            //     { imag: '../assets/images/source/ck01_m.png'},
            //     { imag: '@/assets/images/source/ck02_m.png'},
            //     { imag: '@/assets/images/source/ck03_m.png'},
            // ],
            chicken: {
                title: '雞肉',
                img_m: require('@/assets/images/source/ck01_m.png'),
                img: require('@/assets/images/source/ck01.png'),
                img2: require('@/assets/images/source/ck02.png'),
                img3: require('@/assets/images/source/ck03.png'),
                img4: require('@/assets/images/source/ck04.png'),
                img5: require('@/assets/images/source/ck05.png'),
                farmer: '好棒雞畜產',
                description:
                    '嚴選優質肉品，秉持著品質優良、衛生安全、營養價值等多重特性，研發高品質生鮮食品，謹慎為消費者把關。優質的經營服務團隊一直不斷的成長與茁壯，更採用最新穎的設備，縮短作業流程，分切、包裝、冷藏、運輸一元化，促進肉品產銷現代化，並搭配低溫冷藏車配送，以達到品質安全與衛生。',
                farmerText1:
                    '擁有30多年經驗的養雞達人，透過人文與科技結合，打造專業與經驗匯聚的智慧養雞哲學。',
                farmerText2:
                    '食安把關從源頭做起，嚴格飼養環境管理，培育出品質最優的土雞。',
                farmerText3: '不定期送國內專業機構檢驗，全程低溫冷藏配送，新鮮營養不流失。',
            },
            pork: {
                title: '豬肉',
                img_m: require('@/assets/images/source/p01_m.png'),
                img: require('@/assets/images/source/p01.png'),
                img2: require('@/assets/images/source/p02.png'),
                img3: require('@/assets/images/source/p03.png'),
                img4: require('@/assets/images/source/p04.png'),
                img5: require('@/assets/images/source/p05.png'),
                farmer: '快樂陽光豬牧場',
                description:
                    '臨中央山脈山麓及濁水溪旁，四周環境綠意盎然氣候宜人，以現代化的管理與飼養，妥善控管養殖密度及提供自然的生長環境，增加日照面積及保持環境通風，嚴格執行統進統出的批次生產管理，讓豬隻在友善、乾淨的環境內生長。',
                farmerText1:
                    '定期委託中央畜產會進行豬血清、豬飼料檢驗藥物殘留皆為未檢出與合乎標準的豬隻才能上市。',
                farmerText2:
                    '餵飼日糧玉米與大豆配方飼料來增加生長效益，並添加綜合維生素、礦物質及乳酸菌，使豬隻生長更為一致與健康，育肥期的陽光豬。',
                farmerText3: '冷凍、冷藏豬肉皆通過台灣優良農產品CAS驗證，且在良好的衛生作業環境下，以現代化加工技術，進行嚴格的製程、品質與衛生監控。',
            },
            beef: {
                title: '牛肉',
                img_m: require('@/assets/images/source/cw01_m.png'),
                img: require('@/assets/images/source/cw01.png'),
                img2: require('@/assets/images/source/cw02.png'),
                img3: require('@/assets/images/source/cw03.png'),
                img4: require('@/assets/images/source/cw04.png'),
                img5: require('@/assets/images/source/cw05.png'),
                farmer: '好壯壯安心牛牧場',
                description:
                    '全國唯一通過CAS國家認證和產銷履歷雙驗證的品牌，從牧場生產、肉品分切場至銷售「一條龍」的標準作業，為消費者提供可追溯產品的生產管道。分切衛生嚴格管控，完整冷鏈技術保鮮，以「品質第一」為考量，堅持牛隻屠宰前不灌水、不使用生長激素、不使用瘦肉精，貫徹「新鮮、安心、美味」的生產理念。',
                farmerText1:
                    '依照牛隻不同生理階段營養需求，以飼料作基底，加入新鮮草料、農業副產品，以提供牛隻營養及豐富多元的日糧，並建立友善環境的循環型農業經濟。',
                farmerText2:
                    '注重牛隻的畜養環境，嚴格要求衛生整潔，牛舍每日清洗、定期消毒，營造牛隻舒適的生活空間，堅決不使用生長激素，嚴守藥物使用規定，無藥物殘留問題。',
                farmerText3:
                    '從飼料到肉品的運輸飼養，完全不假手他人，全程監製以確保牛肉的純淨與美味，務必力求爲台灣這片樂土的食安獻上更新鮮安全的台灣在地牛肉。',
            },
            goat: {
                title: '羊肉',
                img_m: require('@/assets/images/source/gt01_m.png'),
                img: require('@/assets/images/source/gt01.png'),
                img2: require('@/assets/images/source/gt02.png'),
                img3: require('@/assets/images/source/gt03.png'),
                img4: require('@/assets/images/source/gt04.png'),
                img5: require('@/assets/images/source/gt05.png'),
                farmer: '活力跳跳羊牧場',
                description:
                    '我們致力於提供健康、天然的食品，同時尊重動物福利和環境可持續性。我們的羊肉是經過精心挑選和處理的，以確保其品質和口感。遵守食品安全和衛生標準，堅持使用天然飼料，不添加任何人工激素或抗生素，從而提供給您最純淨、健康的羊肉產品。',
                farmerText1:
                    '我們的牧草是經過精心栽培和管理的，以確保其營養價值和品質。我們定期進行土壤測試和施肥調整，以確保牧草的營養平衡和生長狀態。',
                farmerText2:
                    '我們重視動物的舒適和健康，有充足的空間供它們活動，確保每隻羊都得到良好的照顧和食物。',
                farmerText3:
                    '新鮮羊肉源自於精心飼養的健康羊群，嚴格控制飼料和飲水的品質，確保每隻羊都獲得均衡的營養，並且沒有使用任何人工激素或抗生素。',
            },
            seafood: {
                title: '海鮮',
                img_m: require('@/assets/images/source/sf01_m.png'),
                img: require('@/assets/images/source/sf01.png'),
                img2: require('@/assets/images/source/sf02.png'),
                img3: require('@/assets/images/source/sf03.png'),
                img4: require('@/assets/images/source/sf04.png'),
                img5: require('@/assets/images/source/sf05.png'),
                img6: require('@/assets/images/source/sf06.png'),
                farmer: '潮鮮養殖場',
                description:
                    '我們大幅降低養殖密度，不用增肥飼料，尤其在收成期間，絕不使用電擊方式，我們在半夜用傳統的流刺網捕撈，避免驚嚇到虱目魚而影響口感。從事友善養殖，所背負的風險與成本遠遠高於一般漁民，但是唯有這樣，才能真正提升養殖漁業的價值，也才能帶給消費者最安心最有保障的商品。',
                farmerText1:
                    '我們也在同一魚池內混養多種物種，如牡蠣、紅杉、龍膽石斑等，以生物鏈方式自然養殖，讓物種自然共生循環。 在生物鏈循環下共生養殖的物種，會自然發揮其原生天性，並將品質發揮到極致。',
                farmerText2:
                    '除了要求不用農藥及藥物，更定期添加水質益生菌及在飼料中加入乳酸菌，為了就是讓我們的魚蝦除了能在好的環境中長大，更要吃的健康，也能使我們的魚蝦更加健康，當然也更加美味。',
                farmerText3:
                    '採用現代化的處理方法，以保持海鮮的新鮮度和營養價值。您可以品嚐到口感鮮嫩、味道鮮美的海鮮，在每一口中感受大自然的恩賜。',
            },
            bg: {
                img: require('@/assets/images/icon_bg/bg_yellow.svg'),
            }
        };
    },
    methods: {
        scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        },
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/all.scss";
@import "@/assets/scss/page/meat.scss";
</style>