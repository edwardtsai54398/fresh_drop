<?php
header('Access-Control-Allow-Origin:*');

try{
    require_once("connect_chd102g2.php");

    $sql = "select giftcard_defaultpic_url
            from giftcard_pic
            where giftcard_pic_status = 0";
            
    $giftcard = $pdo->query($sql);
    $giftcardPic = $giftcard->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode(["連線成功"]);
    echo json_encode($giftcardPic);
}catch(Exception $e){
    echo json_encode(["連線失敗"]);
}
?>