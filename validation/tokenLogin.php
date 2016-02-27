<?php
include_once '../database.php';

$token = isset($_GET['token']) ? $_GET['token'] : '';
$result = db_query("SELECT 1 FROM userprofile WHERE token = '$token' LIMIT 1");

if (($result->num_rows) == 0){
    echo "Token Not Success!";
} else{
    echo "Token Success!";
}

?>
