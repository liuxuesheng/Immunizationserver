<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

$nickname = isset($_GET['nickname']) ? $_GET['nickname'] : '';
$birthday = isset($_GET['birthday']) ? $_GET['birthday'] : '';
$province = isset($_GET['province']) ? $_GET['province'] : '';
$city = isset($_GET['city']) ? $_GET['city'] : '';
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';

//UPDATE `baby_infomation` SET `nickname`='ken',`birthdate`='2000-01-02',`province`='Ontanio',`city`='Thunder Bay',`gender`=0 WHERE email='hanmingyue.hanna@gmail.com'
db_query_noreturn("UPDATE `baby_infomation` SET `nickname`='".$nickname."',`birthdate`='".$birthday."',`province`='".$province."',`city`='".$city."',`gender`='".$gender."' WHERE email='hanmingyue.hanna@gmail.com'");
?>
