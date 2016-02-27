<?php
include_once '../database.php';
include_once 'tokenService.php';
include_once 'encryptPassword.php';

$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

$validUsername = validateUsername($username);
if ($validUsername){
    $hash = getHashFromPassword($password);
    db_query_noreturn("INSERT INTO userprofile (username, hash) VALUES ('$username', '$hash');");
    createAndSaveTokenForUser($username);
    echo "Success!";
} else {
    echo "Username Exists!";
}

function validateUsername($uname){
    $result = db_query("SELECT 1 FROM userprofile WHERE username = '$uname' LIMIT 1");
    $num = $result->num_rows;

    if ($num == 0)
        return true;
    return false;
}
?>
