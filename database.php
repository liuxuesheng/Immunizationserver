<?php
function db_connect() {
    static $conn;

    if(!isset($connection)) {
        $config = parse_ini_file('config.ini'); 
        $conn = new mysqli($config['host'],$config['username'], $config['password'], $config['db']);
    }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function db_query($query) {
    $conn = db_connect();
    $result = mysqli_query($conn,$query);

    return $result;
}

function db_query_noreturn($query) {
    $conn = db_connect();
    mysqli_query($conn,$query);
}

function db_error() {
    $conn = db_connect();
    return mysqli_error($conn);
}
?>
