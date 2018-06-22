<?php

$localhost = "talkingb.mysql.univie.ac.at";
$username = "talkingb";
$password = "F2A-4cN5tD";
$dbname = "talkingb";

// create connection
$connect = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}

?>