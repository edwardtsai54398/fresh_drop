const productList = [
    {
        id: 1,
        name: '滑嫩番茄蛋',
        number: '#01001',
        price: 200,
        catagory:'主菜',
        ingred: [
            '蛋：2個',
            '番茄：1個，切成小塊',
            '洋蔥：1/4個，切成薄片',
            '蒜末：1茶匙',
            '鹽和胡椒粉：適量',
            '青蔥或香菜（可選）：作為裝飾'
        ],
        step: [
            {
                title: '打散蛋液',
                step: ['將蛋打入碗中。','加入少許鹽和胡椒粉。','輕輕攪拌均勻，使蛋液混合均勻。']
            },
            {
                title: '炒煮番茄和洋蔥',
                step: ['在一個平底鍋中，加熱一些油。', '加入洋蔥和蒜末，炒至洋蔥變軟。', '加入番茄塊，繼續炒煮幾分鐘，直到番茄稍微軟化。']
            },
            {
                title: '加入蛋液',
                step: ['將打散的蛋液倒入鍋中。', '用筷子或湯匙輕輕攪拌，使蛋液均勻分佈在番茄和洋蔥之間。', '繼續翻炒幾分鐘，直到蛋液完全凝固，形成滑嫩的蛋花。']
            },
            {
                title: '上桌前處理',
                step: ['確認蛋已經熟透且番茄軟化。', '將滑嫩番茄蛋盛入碗中。', '可以撒上一些切碎的青蔥或香菜作為裝飾。']
            }
        ],
        img: require('@/assets/images/product/1.jpg'),
        stock: 5,
        count: 1
    },
    {
        id: 2,
        name: '奶油啤酒蛤蠣',
        number: '#01002',
        price: 200,
        catagory:'主菜',
        ingred: [
            '500克新鮮蛤蠣',
            '50克奶油',
            '1個洋蔥(切碎)',
            '2瓶啤酒',
            '適量的蒜末',
            '適量的香菜（切碎）',
            '適量的鹽和胡椒粉'
        ],
        step: [
            {
                title: '清洗蛤蠣',
                step: ['將蛤蠣浸泡在鹽水中約15分鐘，以去除其中的沙粒。','清洗蛤蠣外殼，將任何破損的蛤蠣丟棄。']
            },
            {
                title: '烹煮蛤蠣',
                step: ['在一個大鍋中，加入奶油，煮至融化。', '加入洋蔥和蒜末，炒至香氣散發。', '加入啤酒，煮沸後轉中小火。','將蛤蠣放入鍋中，蓋上鍋蓋，煮約5-7分鐘，或直到蛤蠣打開。']
            },
            {
                title: '調味與裝盤',
                step: ['根據個人口味，加入適量的鹽和胡椒粉調味。', '將煮好的蛤蠣撒上香菜，可以加強風味。', '將蛤蠣和湯汁盛入碗中，配上烤麵包或其他喜歡的主食。']
            },
            {
                title: '上桌前處理',
                step: ['熱蓋住鍋中的蛤蠣湯，以保持溫熱狀態。', '將湯汁倒入碗中，將蛤蠣舉起，並用湯匙舀取湯汁。', '配以烤麵包或其他喜歡的主食，即可享受美味的奶油啤酒蛤蠣。']
            },
        ],
        img: require('@/assets/images/product/2.jpg'),
        stock: 5,
        count: 1
    },
    {
        id: 3,
        name: '塔香茄子',
        number: '#01003',
        price: 200,
        catagory:'主菜',
        ingred: [
            '茄子：2個，切成長段',
            '蒜末：2瓣',
            '姜末：1小塊',
            '辣椒粉：1/2茶匙',
            '醬油：1湯匙',
            '糖：1/2茶匙',
            '白芝麻：適量，用於裝飾',
            '香菜：適量，用於裝飾',
        ],
        step: [
            {
                title: '煎茄子',
                step: ['在平底鍋中，加熱一些油。','將茄子放入鍋中，煎至兩面金黃且軟嫩。']
            },
            {
                title: '調製醬汁',
                step: ['在一個碗中，加入蒜末、姜末、辣椒粉、醬油和糖。', '均勻攪拌，使所有調味料充分混合。']
            },
            {
                title: '拌茄子',
                step: ['將煎好的茄子放入一個大碗中。', '倒入調製好的醬汁，輕輕拌勻，使茄子均勻沾滿醬汁。']
            },
            {
                title: '上桌前處理',
                step: ['將拌好的塔香茄子盛入盤子或碗中。', '可以撒上一些白芝麻和香菜作為裝飾。']
            }
        ],
        img: require('@/assets/images/product/3.jpg'),
        stock: 5,
        count: 1
    },
    {
        id: 4,
        name: '生烤貝',
        number: '#01004',
        price: 200,
        catagory:'主菜',
        ingred: [
            '新鮮生貝：選擇您喜歡的貝類，例如生蠔、生蛤蜊等',
            '檸檬：適量，切片作為伴碟',
            '牛油：每個生貝約1小塊（約1/2茶匙）。',
            '大蒜：根據個人喜好，每個生貝約1/4到1/2茶匙切碎的大蒜。',
            '鹽和胡椒粉：根據個人口味調整。',
            '新鮮香草：根據個人喜好，每個生貝約1/4到1/2茶匙切碎的新鮮香草。'
        ],
        step: [
            {
                title: '清洗貝類',
                step: ['將貝類用水徹底清洗，去除表面的泥沙和雜質。','確保貝類的殼表面乾淨。']
            },
            {
                title: '預熱烤箱',
                step: ['打開烤箱，調至高溫預熱，準備烤貝。', '根據貝類的大小和種類，預熱溫度可根據需要調整，通常設定為200°C至220°C。']
            },
            {
                title: '烤貝',
                step: ['在烤盤上鋪上一層鋁箔紙，放置貝類。', '在每個貝類上加入一小塊牛油。你也可以將牛油切成小塊，均勻地分佈在所有貝類上。', '在貝類上撒上切碎的大蒜。根據個人喜好，你可以使用少量或大量的大蒜。','均勻地撒上鹽和胡椒粉。','最後，撒上一些切碎的新鮮香草。選擇你喜歡的香草種類，或混合使用幾種香草，以增添風味。','將貝類放入預熱的烤箱中，烤約5-10分鐘，或直到貝殼開啟和肉質變熟。烤的時間會因貝類的大小而有所不同，請留意貝殼開啟的程度和肉質的變化。']
            },
            {
                title: '上桌前處理',
                step: ['將烤好的生貝取出，放在盤子或碟子上。', '可以擺上一些新鮮檸檬片作為伴碟，增添風味。']
            }
        ],
        img: require('@/assets/images/product/4.jpg'),
        stock: 5,
        count: 1
    },
    {
        id:16,
        name: '日本味噌鮮魚湯',
        number: '#02001',
        price: 200,
        catagory:'湯品',
        ingred: [
            '鮮魚片（如鮭魚、鱈魚等）：200克',
            '蔥：1根，切碎',
            '味噌：2湯匙',
            '海帶（昆布）：一小片（約5x5公分）',
            '温水：4杯',
            '醬油（可選，用於調味）',
        ],
        step: [
            {
                title: '',
                step: ['將海帶放入一個鍋中，加入4杯温水，讓海帶浸泡約10分鐘。','將鍋置於中小火上，加熱至水開始冒泡，然後取出海帶。','在湯中加入蔥和魚片，煮約2-3分鐘，直到魚片熟透。','將味噌放入一個小碗中，加入一些湯汁，攪拌均勻，直到味噌完全溶解。','完成後，您可以依個人口味添加一些醬油進一步調味。請注意，醬油本身已經鹹味，請根據個人喜好添加。享受這道美味的味噌鮮魚湯！']
            },
            
        ],
        img: require('@/assets/images/product/16.jpg'),
        stock: 5,
        count: 1
    },
    {
        id: 17,
        name: '韓國辣椒醬湯',
        number: '#02002',
        price: 200,
        catagory:'湯品',
        ingred: [
            '韓國辣椒醬（Gochujang）：2湯匙',
            '豆腐：約半塊，切成小塊',
            '韓國辣椒粉（Gochugaru）：1茶匙（可依個人喜好增減）',
            '蔥：1根，切碎',
            '大蒜：2瓣，切碎',
            '雞湯或蔬菜湯：約3杯',
            '醬油：1湯匙',
            '糖：1茶匙（可依個人喜好增減）',
            '鹽：適量',
            '蔥花或香菜（作為裝飾）'
        ],
        step: [
            {
                title: '調製湯底',
                step: ['在一個湯鍋中加入雞湯或蔬菜湯，將火開中火燒熱。','將韓國辣椒醬、韓國辣椒粉、蔥和大蒜加入湯鍋中，攪拌均勻。','加入醬油和糖，繼續攪拌，使所有調味料混合在一起。']
            },
            {
                title: '煮豆腐',
                step: ['將切好的豆腐輕輕放入湯鍋中。', '小心攪拌，以免豆腐碎裂。','繼續煮煮豆腐，直到它變得溫熱且完全熟透。']
            },
            {
                title: '調整口味',
                step:  ['根據個人口味，加入適量的鹽調味。', '如果喜歡更辣的口味，可以再加入一些韓國辣椒粉。', '根據喜好，調整鹹度和甜度，添加更多的醬油或糖。']
            },
            {
                title: '上桌前處理',
                step: ['將煮好的韓國辣椒醬湯倒入湯碗中。', '在湯面上灑上一些蔥花或香菜作為裝飾。', '可以單獨享用湯或搭配米飯一起食用。']
            }
        ],
        img: require('@/assets/images/product/17.jpg'),
        stock: 5,
        count: 1
    },
    {
        id: 18,
        name: '法國洋蔥湯',
        number: '#02003',
        price: 200,
        catagory:'湯品',
        ingred: [
            '洋蔥：4個中型洋蔥，切成薄片',
            '牛油：2湯匙',
            '橄欖油：1湯匙',
            '高湯（雞湯或蔬菜湯）：4杯',
            '白酒（選擇性）：1/4杯',
            '乾白葡萄酒：1/4杯',
            '百里香：1小枝',
            '洋蔥湯包或香料袋（可選）',
            '鹽和黑胡椒粉：適量',
            '磨碎的帕瑪森芝士（或其他起司）：作為配菜（可選）'
        ],
        step: [
            {
                title: '炒洋蔥',
                step: ['在一個大鍋或湯鍋中，加入牛油和橄欖油，用中火加熱。','將切好的洋蔥加入鍋中，用中低火慢炒約20分鐘，直到洋蔥變軟、變甜和金黃色。']
            },
            {
                title: '加入湯底',
                step: ['倒入高湯，將火調至中高火煮沸。', '如果您選擇使用白酒和乾白葡萄酒，現在就加入。','加入百里香，調味以適量的鹽和黑胡椒粉。']
            },
            {
                title: '煮沸和燉煮',
                step: ['等湯開始煮沸後，降至中小火，蓋上鍋蓋，繼續燉煮約15-20分鐘，讓洋蔥和湯的風味充分融合。']
            },
            {
                title: '上桌前處理',
                step: ['如果使用洋蔥湯包或香料袋，請將其從湯中取出。', '將煮好的法國洋蔥湯倒入湯碗中。', '可選擇在湯面上灑上一些磨碎的帕瑪森芝士（或其他起司）作為配菜，增添風味。']
            }
            
        ],
        img: require('@/assets/images/product/18.jpg'),
        stock: 5,
        count: 1
    },
    {
        id: 25,
        name: '糖漬番茄',
        number: '#02004',
        price: 200,
        catagory:'沙拉',
        ingred: [
            '番茄：500克',
            '砂糖：200克',
            '白醋：100毫升',
            '水：100毫升'
        ],
        step: [
            {
                title: '',
                step: ['準備番茄。選擇成熟而且稍微硬一些的番茄，切掉蒂部，用刀在番茄底部劃十字切口。','在一個鍋中，將砂糖、白醋和水放入，開中火煮至糖完全溶解。','把番茄放入煮糖水的鍋中，調到中小火，蓋上鍋蓋，讓番茄在糖水中煮約5分鐘。','將煮熟的番茄用網漏或湯網撈出，放入乾淨的容器中。','將剩餘的糖水倒入番茄上，確保番茄完全被覆蓋。讓番茄在糖水中浸泡，待涼後密封容器。','糖漬番茄可以作為小吃單獨食用，也可以添加到沙拉、三明治或其他菜餚中。這個簡易的步驟讓您可以輕鬆製作美味的糖漬番茄！']
            }
            
        ],
        img: require('@/assets/images/product/25.jpg'),
        stock: 5,
        count: 1
    },
    {
        id: 26,
        name: '泰式生菜包',
        number: '#02005',
        price: 200,
        catagory:'沙拉',
        ingred: [
            '生菜葉：適量',
            '雞肉或牛肉絲：約200克',
            '紅辣椒：1個，切碎',
            '蔥：2根，切碎',
            '青檸：1個，切片',
            '魚露：1湯匙',
            '砂糖：1茶匙',
            '蒜末：2瓣',
            '辣椒醬：適量（可選）',
            '花生碎：適量（可選）',
        ],
        step: [
            {
                title: '炒煮肉類',
                step: ['在一個炒鍋中，加熱一些油。','加入蒜末，炒至香味散發。','加入雞肉或牛肉絲，炒至肉變色熟透。']

            },
            {
                title: '調味',
                step: ['加入紅辣椒、蔥和砂糖，繼續翻炒均勻。', '加入魚露，調味並提升風味。','繼續翻炒幾分鐘，讓調味料充分滲入肉中。']
            },
            {
                title: '包裝',
                step: ['取一片生菜葉，將炒好的肉類填入葉中。', '可以添加辣椒醬和花生碎，增添口感和風味。', '擠上一些青檸汁，增加酸爽的口感。']
            },
            {
                title: '上桌前處理',
                step: ['確保泰式生菜包內容物均勻分佈且包裹緊實。', '將包好的泰式生菜包擺盤，可以撒上一些花生碎作為裝飾。', '準備湯匙，即可享用這道清爽美味的泰式生菜包！']
            }
            
        ],
        img: require('@/assets/images/product/26.jpg'),
        stock: 5,
        count: 1
    },
    {
        id: 27,
        name: '中東麥麩沙拉',
        number: '#02006',
        price: 200,
        catagory:'沙拉',
        ingred: [
            '麥麩：1杯',
            '黑豆罐頭：1罐（約400克）',
            '番茄：1個，切丁',
            '青瓜：1根，去皮後切丁',
            '紅洋蔥：1/4個，切碎',
            '薄荷葉或香菜：適量，作為裝飾',
            '檸檬汁：2湯匙',
            '橄欖油：2湯匙',
            '鹽和胡椒粉：適量'
        ],
        steps: [
            {
                title: '煮熟麥麩',
                step: ['在一個鍋中，煮開適量的水。','加入麥麩，根據包裝上的指示時間煮熟。','煮熟後，用濾網過濾掉多餘的水分。']
            },
            {
                title: '混合食材',
                step: ['將煮熟的麥麩轉移到一個大碗中。', '加入黑豆、番茄丁、青瓜丁和紅洋蔥碎。','拌勻混合所有的食材。']
            },
            {
                title: '加入檸檬汁',
                step: ['加入檸檬汁和橄欖油。', '按需添加鹽和胡椒粉，調整至適合的味道。', '輕輕攪拌均勻，確保調味料均勻分佈。']
            },
            {
                title: '上桌前處理',
            },
            ['將中東麥麩沙拉盛入碗或盤中。', '可以在上面撒上一些薄荷葉或香菜作為裝飾。', '準備湯匙，即可享用這道健康美味的中東麥麩沙拉！']
        ],
        img: require('@/assets/images/product/27.jpg'),
        stock: 5,
        count: 1
    }

]

export default productList