<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    // $cusNo = $_POST["cusNo"];
    $cusNo = 1;
    $sql = "select c.cus_no, o.ord_date, o.ord_no, o.ord_addr, o.total_price as price, o.ord_cus,
                    d.ord_status, d.deliv_no, d.week, d2.deliv_detail_no,
                    r.recipe_name, d2.qty
                   
            from customer c left join orders o on c.cus_no=o.cus_no
                            left join delivery d on o.ord_no=d.ord_no
                            left join deliv_detail d2 on d.deliv_no=d2.deliv_no
                            left join recipe r on r.recipe_no=d2.dishno
                            
            where c.cus_no=:cusNo
            order by d.deliv_no desc";

    $memDetail = $pdo->prepare($sql);
    $memDetail->bindValue(":cusNo", $cusNo);
    $memDetail->execute();

    $detailRows = $memDetail->fetchAll(PDO::FETCH_ASSOC);

    //整理訂單資料
    $historyItem = array();
    $weekAdded = array();
    if ($detailRows[0]["ord_no"] !== null) {
        foreach ($detailRows as $index => $item) {

            $week = array(
                "ord_no" => $item["ord_no"],
                "ord_date" => $item["ord_date"],
                "ord_cus" => $item["ord_cus"],
                "ord_addr" => $item["ord_addr"],
                "price" => $item["price"],
                "ord_status" => $item["ord_status"],
                "content" => array()
            );

            $content = array();
            if (!in_array($item["week"], $weekAdded)) {
                foreach ($detailRows as $key => $item2) {
                    $dish = array(
                        "recipe_name" => $item2["recipe_name"],
                        "qty" => $item2["qty"]
                    );
    
                    if ($item["week"] == $item2["week"]) {
                        array_push($content, $dish);
                    }
    
                }
                array_push($weekAdded,$item["week"]);
                $week["content"] = $content;
                array_push($historyItem, $week);
            }
            
        }

    } else {
        $historyItem = array("ord_no" => null);
    }
    var_dump($historyItem);
    exit();


    echo json_encode([$shopHistory, $giftcardRows, $shareRows]);
} catch (Exception $e) {
    echo json_encode(["連線失敗"]);
}
?>