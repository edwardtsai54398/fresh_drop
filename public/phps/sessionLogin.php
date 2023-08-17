<?php
header('Access-Control-Allow-Origin:*');
try{
    require_once("connect_chd102g2.php");
    
    $cusNo = $_POST["cusNo"];

        $sql = "select cus_no, cus_email, cus_pw as psw, cus_pic, cus_name, cus_acc, phone, address, birth
                from customer
                where cus_no=:cusNo";
        $member = $pdo->prepare($sql);
        $member->bindValue(":cusNo", $cusNo);
        $member->execute();
        
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        
        //整理手機號碼
        // $front4 = substr($memberRow["phone"],0,4);
        // $back6 = substr($memberRow["phone"],4,6);
        // $memberRow["phone"] = $front4 . "-" . $back6;
        echo json_encode($memberRow);
        
}catch(Exception $e){
        // echo "連線失敗";
        echo json_encode(["連線失敗"]);
    }


?>