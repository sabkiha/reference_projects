<?php

require_once 'actions/db_connect.php';
require_once 'navbar.php';

if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE postId = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    $connect->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Post</title>
</head>

<body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6"><h1>Talking Borders.</h1></div>
        <div class="col-2"><img src="img/logo_fwf.png" alt="Logo FWF" style="max-height: 40px"></div>
        <div class="col-2"><img src="img/logo_univie.jpg" alt="Logo Vienna University" style="max-height: 40px"></div>
        <div class="col-2" ><img src="img/logo_abs.png" alt="Logo ABS" style="max-height: 40px"></div>
      </div>
        <h2>From Local Expertise to Global Exchange.</h2>
    </div><br> 

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
               <h2>Update Post</h2> 
            </div>
            
        </div>
        <div class="row">
            <div class="col-5 offset-1">
                <form action="actions/a_update.php" method="post" style="display:grid">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Post Text</th>
                            <td>
                                <textarea type="text" name="post_text" placeholder="Post Text" cols="100" rows="5"><?php echo $data['postText'] ?></textarea>
                        </tr>     
                        <tr>
                            <th>Date Posted</th>
                            <td><input type="text" name="post_date" placeholder="Date Posted" value="<?php echo $data['postTime'] ?>" /></td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td><input type="text" name="user" placeholder="User Name" value="<?php echo $data['fk_user'] ?>" /></td>
                        </tr>
                        <tr>
                            <th>Discussion Active</th>
                            <td><input type="text" name="active" placeholder="Discussion Active" value="<?php echo $data['active_notactive'] ?>" /></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $data['postId']?>" />
                            <td><button type="submit" class='btn btn-info'>Save Changes</button></td>
                            <td><a href="home.php"><button type="button" class='btn btn-info' style="margin:5px">Back</button></a></td>
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