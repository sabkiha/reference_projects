
<?php

require_once 'db_connect.php';
require_once 'navbar.php';


if($_POST) {
    $id = $_POST['id'];

    $sql = "DELETE FROM posts WHERE postId = {$id}";
    if($conn->query($sql) === TRUE) {
        echo "<p>Successfully deleted!!</p>";
        echo "<a href='admin_posts.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error updating record : " . $conn->error;
    }

    $conn->close();
}

?>

<?php require_once 'footer.php'; ?>