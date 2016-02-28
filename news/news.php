<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

$recordPage = isset($_GET['page']) ? $_GET['page'] : '';
$section = isset($_GET['section']) ? $_GET['section'] : '';

function returnPage1($page, $sec){
    //title
    $sql = "SELECT news_title FROM ".$sec." WHERE id = $page";

    $conn = db_connect();
    mysqli_query($conn, "SET CHARACTER SET 'utf8';");
    $result = mysqli_query($conn, $sql);
    $news_title = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $news_title .= $row["news_title"] . ",";
        }
    }

    $news_title = substr($news_title, 0, -1);

    //subtitle
    $sql1 = "SELECT news_subtitle FROM ".$sec." WHERE id = $page";
    $result = mysqli_query($conn, $sql1);
    $news_subtitle = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $news_subtitle .= $row["news_subtitle"] . ",";
        }
    }

    $news_subtitle = substr($news_subtitle, 0, -1);

    //image
    $sql2 = "SELECT news_imageURL FROM ".$sec." WHERE id = $page";
    $result = mysqli_query($conn, $sql2);
    $imageURL = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $imageURL .= $row["news_imageURL"] . ",";
        }
    }

    $imageURL = substr($imageURL, 0, -1);

    //content
    $sql3 = "SELECT news_content FROM ".$sec." WHERE id = $page";
    $result = mysqli_query($conn, $sql3);
    $nametring = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $nametring .= $row["news_content"] . ",";
        }
    }

    $nametring = substr($nametring, 0, -1);


$item0 = array(
    'type' => 'webview',
    'url' => $imageURL);


$item1 = array(
    'type' => 'body_news',
    'name' => $nametring);

$item2 = array(
    'type' => 'title_news',
    'name' => $news_title);

$item3 = array(
    'type' => 'subtitle_news',
    'name' => $news_subtitle);


$list = array($item0, $item1,$item2,$item3);
	echo json_encode($list);
}
echo(returnPage1($recordPage, $section))
?>
