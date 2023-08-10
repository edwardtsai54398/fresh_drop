<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    $sql = "select *
            from faq";
    $faq = $pdo->query($sql);
    $faqRows = $faq->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode(["連線成功"]);
    echo json_encode($faqRows);
} catch (Exception $e) {
    echo json_encode(["連線失敗"]);
}
