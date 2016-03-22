<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

$email = isset($_GET['email']) ? $_GET['email'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
$nickname = isset($_GET['nickname']) ? $_GET['nickname'] : '';
$birthday = isset($_GET['birthday']) ? $_GET['birthday'] : '';
$province = isset($_GET['province']) ? $_GET['province'] : '';
$city = isset($_GET['city']) ? $_GET['city'] : '';
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';

db_query_noreturn("INSERT INTO `baby_infomation`(`email`, `token`, `nickname`, `birthdate`, `province`, `city`, `gender`) VALUES ('".$email."','".$token."','".$nickname."','".$birthday."','".$province."','".$city."',".$gender.")");
?>
