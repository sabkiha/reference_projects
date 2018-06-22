<?php

require_once 'db_connect.php';

if($_POST) {
    $postid = $_POST['postId'];
    $ctext = $_POST['com_text'];
    $user = $_POST['user'];

    $sql = "INSERT INTO comments (commentText, fk_user_comment, fk_postId) VALUES ('$ctext', '$user', '$postid')";
    if($connect->query($sql) === TRUE) {
        echo "<p>New Comment Successfully Created</p>";
        echo "<a href='../home.php'><button type='button'>User Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $connect->close();
}

?>