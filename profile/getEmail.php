<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';


function returnEmail(){

    $list = array();

    $token = isset($_GET['token']) ? $_GET['token'] : '';

    $sql0 = "SELECT email FROM baby_infomation where token ='".$token."'";
    getEmail($sql0,$list,'baby_infomation');

    echo json_encode($list);
}

//getEmail 负责从数据库读取email 
function getEmail($mysql, &$list, $section){
    $conn = db_connect();
    mysqli_query($conn, "SET CHARACTER SET 'utf8';");
    $result = mysqli_query($conn, $mysql);  

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $nametring = array('item_section' => $section,'email' => $row["email"]);
            array_push($list, $nametring);
        }
    }
}

echo(returnEmail());

?>