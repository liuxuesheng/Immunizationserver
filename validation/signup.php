<?php
include_once '../database.php';
include_once 'tokenService.php';
include_once 'encryptPassword.php';

$email = isset($_GET['email']) ? $_GET['email'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

$validEmail = validateEmail($email);
if ($validEmail){
    $hash = getHashFromPassword($password);
    db_query_noreturn("INSERT INTO userprofile (email, hash) VALUES ('$email', '$hash');");
    createAndSaveTokenForUser($email);
    echo "Success!";
} else {
    echo "email Exists!";
}

function validateEmail($email){
    $result = db_query("SELECT 1 FROM userprofile WHERE email = '$email' LIMIT 1");
    $num = $result->num_rows;

    if ($num == 0)
        return true;
    return false;
}
?>
