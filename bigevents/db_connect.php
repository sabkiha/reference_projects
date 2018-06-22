<?php

$localhost = "mysqlsvr76.world4you.com";
$username = "sql9993334";
$password = "bm@4hx2";
$dbname = "9950193db3";

// create connection
$conn = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
} else {
    //echo "Successfully Connected";
}

?>


