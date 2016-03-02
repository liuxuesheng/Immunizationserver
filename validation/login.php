<?php
include_once '../database.php';
include_once 'tokenService.php';

$email = isset($_GET['email']) ? $_GET['email'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

$query = "SELECT hash FROM userprofile WHERE email = '".$email."' LIMIT 1";
$result = db_query($query);
$row = $result->fetch_assoc();
$hash = $row["hash"];

// Hashing the password with its hash as the salt returns the same hash
if (is_null($hash) || empty($hash)){
    echo json_encode(array('auth' => 'false'));
} else if (hash_equals($hash, crypt($password, $hash)) ) {
	$token = createAndSaveTokenForUser($email);
    echo json_encode(array('auth' => 'true', 'token' => $token));
} else{
    echo json_encode(array('auth' => 'false'));
}

?>
