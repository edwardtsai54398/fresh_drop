<?php
header('Access-Control-Allow-Origin:*');

try{
    require_once("connect_chd102g2.php");

    $sql = "select ingred_name as name, allergy,dislike
        from ingred 
        where allergy = 1 or dislike = 1";
    $ingred = $pdo->query($sql);
    $ingredRows = $ingred->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode(["連線成功"]);
    $allergy = array();
    $dislike = array();
    foreach ($ingredRows as $item) {
        if ($item["allergy"] == 1) {
            $allergy[] = $item;
        }else if($item["dislike"] == 1){
            $dislike[] = $item;
        }
    }
    echo json_encode([$allergy,$dislike]);
}catch(Exception $e){
    // echo "連線失敗";
    echo json_encode(["連線失敗"]);
}
?>