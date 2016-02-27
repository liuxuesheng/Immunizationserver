<?php
include_once '../database.php';

$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

$query = "SELECT hash FROM userprofile WHERE username = '".$username."' LIMIT 1";
$result = db_query($query);
$row = $result->fetch_assoc();
$hash = $row["hash"];

// Hashing the password with its hash as the salt returns the same hash
if (is_null($hash) || empty($hash)){
    echo "Validation Not Successful!";
} else if (hash_equals($hash, crypt($password, $hash)) ) {
    echo "Validation Successful!";
} else{
    echo "Validation Not Successful!";
}

?>
