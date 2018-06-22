<?php

require_once 'db_connect.php';

if($_POST) {
    $ptext = $_POST['post_text'];
    $user = $_POST['user_posted'];
    $act = $_POST['active'];    

    $sql = "INSERT INTO posts (postText, fk_user, active_notactive) VALUES ('$ptext',  '$user', '$act')";
    if($connect->query($sql) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../home.php'><button type='button'>Admin List</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $connect->close();
}

?>