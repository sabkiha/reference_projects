

<?php

require_once 'db_connect.php';
require_once 'navbar.php';

if($_POST) {
    $ptext = $_POST['post_text'];
    $pdate = $_POST['post_date'];
    $usr = $_POST['user'];
    $act = $_POST['active'];
    $id = $_POST['id'];

    $sql = "UPDATE posts SET postText = '$ptext', postTime = '$pdate', fk_user = '$usr', active_notactive = '$act'  WHERE postId = {$id}";
    if($conn->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='update.php?id=".$id."'><button type='button' class='btn btn-info'>Back</button></a>&nbsp;"; 
        echo "<a href='admin_posts.php'><button type='button' class='btn btn-info'>Admin List</button></a>";
    } else {
        echo "Erorr while updating record : ". $conn->error;
    }

    $conn->close();
}

?>


<?php require_once 'footer.php'; ?>