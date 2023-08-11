<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    $cusNo = $_POST["cusNo"];
    $newAcc = $_POST["acc"];
    $newPhone = $_POST["phone"];
    $newEmail = $_POST["email"];
    $newAddress = $_POST["address"];


    $sql = "update customer
        set cus_acc=:newAcc,
            phone=:newPhone,
            cus_email=:newEmail,
            address=:newAddress,
        where cus_no=:cusNo";
    $member = $pdo->prepare($sql);

    $member->bindValue(":cusNo", $cusNo);
    $member->bindValue(":newAcc", $newAcc);
    $member->bindValue(":newPhone", $newPhone);
    $member->bindValue(":newEmail", $newEmail);
    $member->bindValue(":newAddress", $newAddress);
    $member->execute();
    echo json_encode(["資料修改成功！"]);
} catch (Exception $e) {
    // echo "連線失敗";
    echo json_encode(["Something went wrong...!We're truely sorry QQ"]);
    // echo json_encode([$e]);
}
?>