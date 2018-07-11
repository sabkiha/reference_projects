
<?php

require_once 'db_connect.php';
require_once 'navbar.php';

if($_POST) {
    $ctext = $_POST['comment_text'];
    $id = $_POST['id'];

    $sql = "UPDATE comments SET commentText = '$ctext'  WHERE commentId = {$id}";
    if($conn->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='update_comment.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='admin_comments.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $conn->error;
    }

    $conn->close();
}

?>

<?php require_once 'footer.php'; ?>