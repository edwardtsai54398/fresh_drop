<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    $cusNo = $_POST["cusNo"];
    // $cusNo = 1;
    $sql = "select o.ord_date, o.ord_no, o.ord_addr, o.total_price as price, o.ord_cus,
                    d.ord_status, d.deliv_no, d.week, d2.deliv_detail_no,
                    r.recipe_name, r.recipe_pic, r.class, d2.qty,
                    g.giftcard_no as 'g_no', g.giftcard_balance as remain, g.giftcard_purchase_date as 'g_date', g.giftcard_money as 'g_money',
                    c2.cus_name as giver, g.giftcard_pic_url as g_pic,
                    r2.recipe_name as 'share_dishname', s.experience as 'share_txt', s.opinion_no_pic as 'share_pic', s.share_time,s.opinion_no
            from customer c left join orders o on c.cus_no=o.cus_no
                            left join delivery d on o.ord_no=d.ord_no
                            left join deliv_detail d2 on d.deliv_no=d2.deliv_no
                            left join recipe r on r.recipe_no=d2.dishno
                            left join giftcard g on c.cus_no=g.owner
                            left join customer c2 on c2.cus_no=g.giver
                            left join opinion s on c.cus_no=s.member
                            left join recipe r2 on r2.recipe_no=s.recipeno
            where c.cus_no=:cusNo
            order by d.deliv_no desc,s.share_time desc";

    $memDetail = $pdo->prepare($sql);
    $memDetail->bindValue(":cusNo", $cusNo);
    $memDetail->execute();

    $detailRows = $memDetail->fetchAll(PDO::FETCH_ASSOC);

    //整理訂單資料
    $originLen = count($detailRows);
    $shopHistory = array();
    if ($detailRows[0]["ord_no"] !== null) {
        $weekLen = array_unique(array_column($detailRows, "week"))[0];
        foreach ($detailRows as $index => $item) {

            $historyItem = array(
                "ord_no" => $item["ord_no"],
                "ord_date" => $item["ord_date"],
                "ord_cus" => $item["ord_cus"],
                "ord_addr" => $item["ord_addr"],
                "price" => $item["price"],
                "week" => $item["week"],
                "ord_status" => $item["ord_status"],
                "content" => array()
            );
            $timestamp = strtotime($historyItem["ord_date"]);
            $datePart = date("Y-m-d", $timestamp);
            $historyItem["ord_date"] = $datePart;

            $weekContent = array();
            $contentAlreadyHas = array();
            foreach ($detailRows as $key => $item2) {
                if (!in_array($item2["deliv_detail_no"], $contentAlreadyHas)) {
                    $dish = array(
                        "recipe_name" => $item2["recipe_name"],
                        "recipe_pic" => $item2["recipe_pic"],
                        "class" => $item2["class"],
                        "qty" => $item2["qty"]
                    );
                    if ($item2["deliv_no"] == $item["deliv_no"]) {
                        array_push($weekContent, $dish);
                        $contentAlreadyHas[] = $item2["deliv_detail_no"];
                    }
                }

            }
            $historyItem["content"] = $weekContent;

            if ($index == $originLen - 1) {
                #如果是最後一筆(無下一筆可以比對deliv_no)，就推到$shopHistory
                array_push($shopHistory, $historyItem);
            } else if ($item["deliv_no"] !== $detailRows[$index + 1]["deliv_no"]) {
                #如果下一筆deliv_no是不一樣的，就推到$shopHistory
                array_push($shopHistory, $historyItem);
            }
        }

    } else {
        $shopHistory = array("ord_no" => null);
    }
   
    //整理禮物卡資料
    $giftcardRows = array();
    $giftAdded = array();
    if ($detailRows[0]["g_no"] !== null) {
        #如果第一筆g_no是空值，代表沒有任何禮物卡歷史紀錄
        foreach ($detailRows as $index => $item) {
            $giftcardItem = array(
                "g_no" => $item["g_no"],
                "g_pic" => $item["g_pic"],
                "giver" => $item["giver"], 
                "remain" => $item["remain"], 
                "g_date" => $item["g_date"], 
                "g_money" => $item["g_money"]
            );
        
            if (!in_array($item["g_no"],$giftAdded)) {
                array_push($giftcardRows, $giftcardItem);
                array_push($giftAdded, $giftcardItem["g_no"]);
            }
        }
    } else {
        $giftcardRows = array("g_no" => null);
    }
    

    //整理心得分享
    $shareRows = array();
    $shareAlreadyHas = array();
    if ($detailRows[0]["opinion_no"] !== null) {
        foreach ($detailRows as $index => $item) {
            $shareItem = array(
                "share_dishname" => $item["share_dishname"],
                "share_txt" => $item["share_txt"],
                "share_pic" => $item["share_pic"],
                "share_time" => $item["share_time"],
                "opinion_no" => $item["opinion_no"]
            );
            $timestamp = strtotime($shareItem["share_time"]);
            $datePart = date("Y-m-d", $timestamp);
            $shareItem["share_time"] = $datePart;

            if (!in_array($item["opinion_no"],$shareAlreadyHas)) {
                array_push($shareRows, $shareItem);
                array_push($shareAlreadyHas, $shareItem["opinion_no"]);
            }
        }
    } else {
        $shareRows = array("opinion_no" => null);
    }
    // var_dump($giftcardRows);
    // exit();
    echo json_encode([$shopHistory, $giftcardRows, $shareRows]);
} catch (Exception $e) {
    echo json_encode(["連線失敗"]);
}
?>