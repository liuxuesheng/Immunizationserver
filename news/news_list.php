<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

function returnNewsList(){
$list = array();

 $sql0 = "SELECT id,news_title,news_subtitle,news_date,news_imageURL FROM health_news ORDER BY id DESC LIMIT 3";
getNewsHasImage($sql0,$list,'health_news');

$sql1 = "SELECT id,news_title,news_subtitle,news_date,news_imageURL FROM health_knowledge ORDER BY id DESC LIMIT 3";
getNewsHasImage($sql1,$list,'health_knowledge');


echo json_encode($list);
}

//getNewsHasImage 负责从数据库读取带有缩略图的新闻
function getNewsHasImage($mysql, &$list, $section){
    $conn = db_connect();
    mysqli_query($conn, "SET CHARACTER SET 'utf8';");
    $result = mysqli_query($conn, $mysql);  

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $nametring = array('item_section' => $section, 'id' => $row["id"], 'news_title' => $row["news_title"], 'news_subtitle' => $row["news_subtitle"], 'news_date' => $row["news_date"], 'news_imageURL' => $row["news_imageURL"]);
            array_push($list, $nametring);
        }
    }
}

 echo(returnNewsList());
?>
