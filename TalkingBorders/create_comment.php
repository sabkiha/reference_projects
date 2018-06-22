<?php

require_once 'actions/db_connect.php';

    $sql = "SELECT * FROM comments";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    $connect->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>New Comment</title>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
        table tr th {
            padding-top: 20px;
        }
    </style>
</head>

<body>

<fieldset>
    <legend>New Comment</legend>

    <form action="actions/a_create_comment.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Comment Text</th>
                <td><input type="text" name="com_text" placeholder="Comment Text" /></td>
            </tr>     
            <tr>
                <th>User</th>
                <td><input type="text" name="user_com" placeholder="Commenting User" value="<?php echo $data['fk_user_comment'] ?>" /></td>
            </tr>
            <tr>
                <th>Id of Post Commented on</th>
                <td><input type="text" name="com_postid" placeholder="Post Commented on" value="<?php echo $data['fk_postId'] ?>" /></td>
            </tr>
            <tr>
                <th>Id of Comment Commented on</th>
                <td><input type="text" name="com_comid" placeholder="Comment Commented on" value="<?php echo $data['fk_commentId'] ?>" /></td>
            </tr>
            <tr>
                <td><button type="submit">Add New Comment</button></td>
                <td><a href="home.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>

</fieldset>

</body>
</html>