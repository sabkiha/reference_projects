<?php

require_once 'db_connect.php';



if($_POST) {
    $id = $_POST['id'];

    $sql = "DELETE FROM posts WHERE postId = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Successfully deleted!!</p>";
        echo "<a href='../home.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error updating record : " . $connect->error;
    }

    $connect->close();
}

?>