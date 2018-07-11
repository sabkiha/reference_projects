<?php

require_once 'db_connect.php';
require_once 'navbar.php';


if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `comments`
    LEFT JOIN `posts` ON `comments`.`fk_postId` = `posts`.`postId` WHERE commentId = {$id}";

    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Comment</title>
</head>

<body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h1>Talking Borders.</h1></div>
        <div class="col-sm-2"><img src="img/logo_fwf.png" alt="Logo FWF" style="max-height: 40px"></div>
        <div class="col-sm-2"><img src="img/logo_univie.jpg" alt="Logo Vienna University" style="max-height: 40px"></div>
        <div class="col-sm-2" ><img src="img/logo_abs.png" alt="Logo ABS" style="max-height: 40px"></div>
      </div>
        <h2>From Local Expertise to Global Exchange.</h2>
    </div><br> 

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
               <h2>Update Comment</h2> 
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-5 offset-1">
                <form action="a_update_comment.php" method="post" style="display:grid">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Comment ID</th>
                            <td><?php echo $data['commentId'] ?></td>
                        </tr> 
                        <tr>
                            <th>Comment Text</th>
                            <td>
                                <textarea type="text" name="comment_text" placeholder="Comment Text" cols="100" rows="5"><?php echo $data['commentText'] ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td><?php echo $data['fk_user_comment'] ?></td>
                        </tr>
                        <tr>
                            <th>Id of Post Commented on</th>
                             <td><?php echo $data['fk_postId'] ?></td>
                        </tr>
                        <tr>
                            <th>Post Text</th>
                            <td><textarea type="text" name="post_text" placeholder="Post Text"cols="100" rows="5"><?php echo $data['postText'] ?></textarea></td>                          
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $data['commentId']?>" /><button type="submit" class='btn btn-info btn-sm'>Save Changes</button>
                            </td>
                            <td>
                                <a href="admin_comments.php"><button type="button" class='btn btn-info btn-sm'>Back</button></a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>


</body>
</html>

<?php
}
?>

<?php require_once 'footer.php'; ?>