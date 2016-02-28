<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

$whichImage = isset($_GET['image']) ? $_GET['image'] : '';

function returnNewsImageList($imageOrder){
    $sql = "SELECT id,news_imageURL,news_title FROM health_knowledge ORDER BY id DESC LIMIT ".$imageOrder.", 1";

    $conn = db_connect();
    mysqli_query($conn, "SET CHARACTER SET 'utf8';");
    $result = mysqli_query($conn, $sql);

    $list = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $record = array('section' => 'health_knowledge', 'id' => $row["id"], 'news_imageURL' => $row["news_imageURL"], 'news_title' => $row["news_title"]);
            array_push($list, $record);
    }
}

    echo json_encode($list);
}

echo(returnNewsImageList($whichImage))
?>

