<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';


function returnEmail(){

    //title
    $sql = " SELECT baby_infomation.email FROM `baby_infomation`,`userprofile` WHERE userprofile.email = 'hanmingyue.hanna@gmail.com' AND userprofile.email = baby_infomation.email";


    $conn = db_connect();
    mysqli_query($conn, "SET CHARACTER SET 'utf8';");
    $result = mysqli_query($conn, $sql);
    $email = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $email .= $row["email"] . ",";
        }
    }

    $email = substr($email, 0, -1);



$item = array(
    'type' => 'email',
    'name' => $email);


$list = array($item);
	echo json_encode($list);

}

echo(returnEmail())
?>