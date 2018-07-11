<?php
 ob_start();
 session_start();

 require_once 'dbconnect.php';
 require_once 'navbar.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }

 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<?php
$servername = "talkingb.mysql.univie.ac.at";
$username   = "talkingb";
$password   = "F2A-4cN5tD"; 
$dbname     = "talkingb";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}
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
    	<a class="btn btn-info btn-lg" href="admin_home.php" role="button">Admin Home</a>
    </div>  
  </div><br><br>


  <div class="row">
    <div class="col-11"><h2>Welcome - User Name: &nbsp;&nbsp;<span style="color: purple"> <?php echo $userRow['userName']; ?> </span>  </h2>
    </div>
  </div><br>
</div>

<div class="container-fluid">
  <h1>ADMIN - COMMENTS</h1>

  <div class="manageComments">
<br><br>
      <table border="1" cellspacing="0" cellpadding="0">
          <thead>
              <tr>
                  <th>Comment Id</th>
                  <th>Comment Text</th>
                  <th>User Name</th>
                  <th>Post Id (commented on)</th>
                  <th>Post text</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $sql = "SELECT `comments`.`commentId`, `comments`.`commentText`, `users`.`userName`, `posts`.`postId`, `posts`.`postText`
                  FROM `comments`
                      LEFT JOIN `posts` ON `comments`.`fk_postId` = `posts`.`postId`
                      LEFT JOIN `users` ON `comments`.`fk_user_comment` = `users`.`userId`
                  WHERE (`comments`.`commentId` IS NOT NULL) ORDER BY `posts`.`postText` ASC, `comments`.`commentId` ASC";
              
              $result = $conn->query($sql);

              if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>
                          <td>".$row['commentId']."</td>
                          <td>".$row['commentText']."</td>
                          <td>".$row['userName']."</td>
                          <td>".$row['postId']."</td>
                          <td>".$row['postText']."</td>
                          <td>
                              <a href='update_comment.php?id=".$row['commentId']."'><button type='button' class='btn btn-info btn-sm'>Update</button></a><br>
                              <a href='delete_comment.php?id=".$row['commentId']."'><button type='button' class='btn btn-info btn-sm'>Delete</button></a>
                          </td>
                      </tr>";
                  }
              } else {
                  echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
              }

              ?>
          </tbody>
      </table>
  </div>
</div>





<?php ob_end_flush(); ?>
<?php require_once 'footer.php'; ?>

