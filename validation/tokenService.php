<?php
include_once '../database.php';

function createAndSaveTokenForUser($username) {
    $token = bin2hex(openssl_random_pseudo_bytes(64));
    while(true){
        $result = db_query("SELECT 1 FROM userprofile WHERE token = '$token' LIMIT 1");
        $num = $result->num_rows;
        if ($num == 0)
            break;
        $token = bin2hex(openssl_random_pseudo_bytes(64));
    }

    db_query_noreturn("UPDATE userprofile SET token='$token' WHERE username='$username'");

    return $token;
}
?>
