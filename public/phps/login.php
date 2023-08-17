<?php
header('Access-Control-Allow-Origin:*');
// $email = $_POST["email"];
// $psw = $_POST["password"];
try{
    require_once("connect_chd102g2.php");
    
    $email = $_POST["email"];
    $psw = $_POST["password"];
    // $psw = "865nQtf2";
        $sql = "select cus_no, cus_email, cus_pic, cus_name, cus_acc, phone, address, birth
                from customer
                where cus_email=:memEmail and cus_pw=:memPsw";
        $member = $pdo->prepare($sql);
        $member->bindValue(":memEmail", $email);
        $member->bindValue(":memPsw", $psw);
        $member->execute();
        

    if ($member->rowCount() === 0) {
        echo json_encode([0]);
    }else{
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode($memberRow);

    }
        
    // echo json_encode(["連線成功"]);
}catch(Exception $e){
        // echo "連線失敗";
        echo json_encode(["連線失敗"]);
    }


?>