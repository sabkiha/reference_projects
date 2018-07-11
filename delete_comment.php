<?php

require_once 'db_connect.php';
require_once 'navbar.php';

if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM comments WHERE commentId = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Comment</title>
</head>

<body>
<h3>Do you really want to delete this comment?</h3>

<form action="a_delete_comment.php" method="post">
    <input type="hidden" name="id" value="<?php echo $data['commentId'] ?>" />
    <button type="submit">Yes, delete it!</button>
    <a href="admin_comments.php"><button type="button">No, go back!</button></a>
</form>

</body>
</html>

<?php
}
?>

<?php require_once 'footer.php'; ?>