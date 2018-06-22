<?php

require_once 'actions/db_connect.php';

    $sql = "SELECT * FROM posts";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    $connect->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>New Post</title>
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
    <legend>New Post</legend>

    <form action="actions/a_create.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Post Text</th>
                <td><input type="text" name="post_text" placeholder="Post Text" /></td>
            </tr>     
            <tr>
                <th>User Posted</th>
                <td><input type="text" name="user_posted" placeholder="User Posted" value="<?php echo $data['fk_user'] ?>" /></td>
            </tr>
            <tr>
                <th>Post Active</th>
                <td><input type="text" name="active" placeholder="Post Active ?" />Use Value 1 for Active = Visible</td>
            </tr>
            <tr>
                <td><button type="submit">Add New Post</button></td>
                <td><a href="home.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>

</fieldset>

</body>
</html>