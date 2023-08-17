<?php
header('Access-Control-Allow-Origin:*');

try{
    require_once("connect_chd102g2.php");

    $sql = "select * from opinion";
    $opinion = $pdo->query($sql);
    $opinionRows = $opinion->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode(["連線成功"]);
    echo json_encode($opinionRows);
}catch(Exception $e){
    // echo "連線失敗";
    echo json_encode(["連線失敗"]);
}
?>