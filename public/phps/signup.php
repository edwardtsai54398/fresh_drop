<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $birth = $_POST["birth"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $address = $_POST["add"];
    $acc = "匿名胡蘿蔔";
    $pic = "1.png";

    // $name = "蔡宗驊";
    // $gender = "男";
    // $birth = "1994-5-24";
    // $phone = "0952-099091";
    // $email = "fashion.donk@gmail.com";
    // $psw = "crank8765";
    // $address = "台中市西屯區昕北大到六段468號";

    $compareSql = "select cus_pw
        from customer
        where cus_pw = :checkPsw";
    $compareMem = $pdo->prepare($compareSql);
    $compareMem->bindValue(":checkPsw", $psw);
    $compareMem->execute();
    // var_dump($compareMem->rowCount());
    // exit();
    if ($compareMem->rowCount() === 0) {
        $signSql = "insert into customer(cus_name,
                                cus_gender,
                                birth,
                                phone,
                                cus_email,
                                cus_pw,
                                address,
                                cus_acc,
                                cus_pic)
            values (:name, :gender, :birth, :phone, :email,
                :psw, :address, :acc, :pic)";
        $member = $pdo->prepare($signSql);
        $member->bindValue(":name", $name);
        $member->bindValue(":gender", $gender);
        $member->bindValue(":birth", $birth);
        $member->bindValue(":phone", $phone);
        $member->bindValue(":email", $email);
        $member->bindValue(":psw", $psw);
        $member->bindValue(":address", $address);
        $member->bindValue(":acc", $acc);
        $member->bindValue(":pic", $pic);
        $member->execute();

        echo json_encode(["註冊成功"]);
    } else {
        echo json_encode(["此密碼已有人使用"]);
        
    }

} catch (Exception $e) {
    // echo "連線失敗";
    echo json_encode(["Something went wrong...!We're truely sorry QQ"]);
    // echo json_encode([$e]);
}
?>