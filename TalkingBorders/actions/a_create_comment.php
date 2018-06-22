<?php

require_once 'db_connect.php';

if($_POST) {
    $ctext = $_POST['com_text'];
    $ucom = $_POST['user_com'];
    $cpid = $_POST['com_postid'];
    $ccid = $_POST['com_comid'];

    $sql = "INSERT INTO comments (commentText, fk_user_comment, fk_postId, fk_commentId) VALUES ('$ctext',  '$ucom', '$cpid', '$ccid')";
    if($connect->query($sql) === TRUE) {
        echo "<p>New Comment Successfully Created</p>";
        echo "<a href='../create_comment.php'><button type='button'>Back</button></a>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $connect->close();
}

?>