<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    $cusNo = $_POST["cusNo"];
    $newPsw = $_POST["newPsw"];


    $sql = "update customer
        set cus_pw=:newPsw
        where cus_no=:cusNo";
    $member = $pdo->prepare($sql);

    $member->bindValue(":cusNo", $cusNo);
    $member->bindValue(":newPsw", $newPsw);
    $member->execute();
    echo json_encode(["密碼修改成功！"]);
} catch (Exception $e) {
    // echo "連線失敗";
    echo json_encode(["Something went wrong...!We're truely sorry QQ"]);
    // echo json_encode([$e]);
}
?>