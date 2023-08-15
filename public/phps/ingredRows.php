<?php
header('Access-Control-Allow-Origin:*');

try{
    require_once("connect_chd102g2.php");

    $sql = "select ingred_no, ingred_name, allergy, dislike
            from ingred";
    $ingred = $pdo->query($sql);
    $ingredRows = $ingred->fetchAll(PDO::FETCH_ASSOC);

    foreach ($ingredRows as &$row) {
        switch ($row['allergy']) {
            case '':
                $row['allergy'] = '無';
                break;
            case 0:
                $row['allergy'] = '否';
                break;
            case 1:
                $row['allergy'] = '是';
                break;
        }
        switch ($row['dislike']) {
            case '':
                $row['dislike'] = '無';
                break;
            case 0:
                $row['dislike'] = '否';
                break;
            case 1:
                $row['dislike'] = '是';
                break;
        }
    }

    echo json_encode($ingredRows);
}catch(Exception $e){
    echo json_encode(["連線失敗"]);
}
?>
