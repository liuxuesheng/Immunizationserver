<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

$nickname = isset($_GET['nickname']) ? $_GET['nickname'] : '';

db_query_noreturn("DELETE FROM`baby_infomation` WHERE nickname = '".$nickname."'");
?>
