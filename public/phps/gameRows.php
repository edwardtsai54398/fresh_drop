<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    $sql = "SELECT g.*,
    (SELECT recipe_name FROM recipe WHERE recipe_no = g.dish1) AS dish1_recipe,
    (SELECT recipe_name FROM recipe WHERE recipe_no = g.dish2) AS dish2_recipe,
    (SELECT recipe_name FROM recipe WHERE recipe_no = g.dish3) AS dish3_recipe,
    (SELECT recipe_name FROM recipe WHERE recipe_no = g.dish4) AS dish4_recipe,
    (SELECT recipe_pic FROM recipe WHERE recipe_no = g.dish1) AS dish1_pic,
    (SELECT recipe_pic FROM recipe WHERE recipe_no = g.dish2) AS dish2_pic,
    (SELECT recipe_pic FROM recipe WHERE recipe_no = g.dish3) AS dish3_pic,
    (SELECT recipe_pic FROM recipe WHERE recipe_no = g.dish4) AS dish4_pic
FROM game AS g 
WHERE g.status = 1";
    $game = $pdo->query($sql);
    $gameRows = $game->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode(["連線成功"]);
    echo json_encode($gameRows);
} catch (Exception $e) {
    echo json_encode(["連線失敗"]);
}
