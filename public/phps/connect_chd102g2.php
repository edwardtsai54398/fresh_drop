<?php
//開發用
$user = "root";
$psw = "";
$port = 3306;
$dbname = "fresh_drop";

// //上線用
// $user = "tibamefe_since2021";
// $psw = "vwRBSb.j&K#E";
// $port = 3306;
// $dbname = "tibamefe_chd102g2";

$dsn = "mysql:host=localhost;port=$port;dbname=$dbname;charset=utf8";

$option = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE=>PDO::CASE_NATURAL);
$pdo = new PDO($dsn, $user, $psw, $option);
?>