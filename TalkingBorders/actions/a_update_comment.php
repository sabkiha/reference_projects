<?php

require_once 'db_connect.php';

if($_POST) {
    $ctext = $_POST['comment_text'];
    $id = $_POST['id'];

    $sql = "UPDATE comments SET commentText = '$ctext'  WHERE commentId = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update_comment.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }

    $connect->close();
}

?>