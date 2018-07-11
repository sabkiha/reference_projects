<?php
 ob_start();
 session_start();

require_once 'db_connect.php';
require_once 'navbar.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }

$servername = "talkingb.mysql.univie.ac.at";
$username   = "talkingb";
$password   = "F2A-4cN5tD"; 
$dbname     = "talkingb";


 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<?php
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}
?>
<?php 

    if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT `posts`.`postId`,`posts`.`postText`, `posts`.`fk_user`, `comments`.`commentText`, `users`.`userName` 
            FROM `posts`
            LEFT JOIN `comments` ON `comments`.`fk_postId` = `posts`.`postId` 
            LEFT JOIN `users` ON `comments`.`fk_user_comment` = `users`.`userId`
            WHERE postId = {$id}
            ORDER BY `posts`.`postId`  ASC";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();
 ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-5"><h1>Talking Borders.</h1></div>
    <div class="col-sm-2"><img src="img/logo_fwf.png" alt="Logo FWF" style="max-height: 40px"></div>
    <div class="col-sm-2"><img src="img/logo_univie.jpg" alt="Logo Vienna University" style="max-height: 40px"></div>
    <div class="col-sm-2" ><img src="img/logo_abs.png" alt="Logo ABS" style="max-height: 40px"></div>
        <div class="col-sm-1">
      <a href="logout.php?logout" class="btn btn-info btn-lg">Logout</a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-11"><h2>From Local Expertise to Global Exchange.</h2></div>
    <div class="col-sm-1">
        <a class="btn btn-info btn-lg" href="user_home.php" role="button">User Menu</a>
    </div>  
  </div><br><br>

<div class="container-fluid">
<div class="row">
    <div class="col-sm-11"><h2>Hi, user  &nbsp;<span style="color: purple"> <?php echo $userRow['userName']; ?> </span>  </h2>
    </div>
  </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 offset-2">
            <form action="a_create_user_comment.php" method="post">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Post No.</th>
                        <td><input type="text" name="postId" placeholder="User Name" value="<?php echo $data['postId']; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Post Text</th>
                        <td><textarea type="text" name="post_text" placeholder="Post Text"cols="100" rows="5"><?php echo $data['postText']; ?></textarea>
                    </tr>
                    <tr>
                        <th>User</th>
                        <td><input type="text" name="user" placeholder="User Name" value="<?php echo $data['fk_user']; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Comments so far</th>
                        <td><?php echo $data['commentText']; ?></td>
                    </tr>
                    <tr>
                        <th>Comment Text</th>
                        <td><textarea type="text" name="com_text" placeholder="Comment Text"cols="100" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class='btn btn-info btn-lg'>Add New Comment</button></td>
                        <td><a href="home.php"><button type="button" class='btn btn-info btn-lg'>Back</button></a></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>  
</div>

<?php
}
?>

<?php ob_end_flush(); ?>
<?php require_once 'footer.php'; ?>