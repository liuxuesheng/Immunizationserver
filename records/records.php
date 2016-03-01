<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

$recordPage = isset($_GET['page']) ? $_GET['page'] : '';
$section = isset($_GET['section']) ? $_GET['section'] : '';

function returnPage1($page, $sec){

    //title
    $sql = "SELECT immu_name FROM ".$sec." WHERE id = $page";

    $conn = db_connect();
    mysqli_query($conn, "SET CHARACTER SET 'utf8';");
    $result = mysqli_query($conn, $sql);
    $immu_name = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $immu_name .= $row["immu_name"] . ",";
        }
    }

    $immu_name = substr($immu_name, 0, -1);

    //subtitle
    $sql1 = "SELECT immu_subtitle FROM ".$sec." WHERE id = $page";
    $result = mysqli_query($conn, $sql1);
    $immu_subtitle = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $immu_subtitle .= $row["immu_subtitle"] . ",";
        }
    }

    $immu_subtitle = substr($immu_subtitle, 0, -1);

   
    //content
    $sql3 = "SELECT immu_description FROM ".$sec." WHERE id = $page";
    $result = mysqli_query($conn, $sql3);
    $nametring = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $nametring .= $row["immu_description"] . ",";
        }
    }

    $nametring = substr($nametring, 0, -1);



$item1 = array(
    'type' => 'body_records',
    'name' => $nametring);

$item2 = array(
    'type' => 'title_records',
    'name' => $immu_name);

$item3 = array(
    'type' => 'subtitle_records',
    'name' => $immu_subtitle);


$list = array($item1,$item2,$item3);
	echo json_encode($list);
}
echo(returnPage1($recordPage, $section))
?>
