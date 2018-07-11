
<?php

require_once 'db_connect.php';
require_once 'navbar.php';

if($_POST) {
    $postid = $_POST['postId'];
    $ctext = $_POST['com_text'];
    $user = $_POST['user'];

    $sql = "INSERT INTO comments (commentText, fk_user_comment, fk_postId) VALUES ('$ctext', '$user', '$postid')";
    if($conn->query($sql) === TRUE) {
        echo "<p>New Comment Successfully Created</p>";
        echo "<a href='home.php'><button type='button' class='btn btn-info btn-lg'>User Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $conn->conn_error;
    }

    $conn->close();
}

require_once 'footer.php';
?>
