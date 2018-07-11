<?php

require_once 'db_connect.php';
require_once 'navbar.php';

if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE postId = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Post</title>
</head>

<body>
<h3>Do you really want to delete this post?</h3>

<form action="a_delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $data['postId'] ?>" />
    <button type="submit">Yes, delete it!</button>
    <a href="admin_posts.php"><button type="button">No, go back!</button></a>
</form>

</body>
</html>

<?php
}
?>