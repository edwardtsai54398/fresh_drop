<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    $reciveCusEmail = $_POST["email"];
    // $reciveCusEmail = "Andy_ns@freshdrop.com";


    //查詢收禮者的客戶編號
    $searchSql = "select *
                        from customer
                        where cus_email=:email";
    $member = $pdo->prepare($searchSql);
    $member->bindValue(":email", $reciveCusEmail);
    $member->execute();
    $memberRow = $member->fetch(PDO::FETCH_ASSOC);

    echo json_encode($memberRow);
} catch (Exception $e) {
    // echo "連線失敗";
    echo json_encode(["Something went wrong...!We're truely sorry QQ"]);
    // echo json_encode([$e]);
}
?>