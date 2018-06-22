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

<div class="container-fluid">
  <div class="row">
    <div class="col-5"><h1>Talking Borders.</h1></div>
    <div class="col-2"><img src="img/logo_fwf.png" alt="Logo FWF" style="max-height: 40px"></div>
    <div class="col-2"><img src="img/logo_univie.jpg" alt="Logo Vienna University" style="max-height: 40px"></div>
    <div class="col-2" ><img src="img/logo_abs.png" alt="Logo ABS" style="max-height: 40px"></div>
        <div class="col-1">
      <a href="logout.php?logout" class="btn btn-info btn-lg">Logout</a>
    </div>
  </div>
  <div class="row">
    <div class="col-11"><h2>From Local Expertise to Global Exchange.</h2></div>
    <div class="col-1">
        <a class="btn btn-info btn-lg" href="user_home.php" role="button">User Menu</a>
    </div>  
  </div><br><br>

<div class="container-fluid">
<div class="row">
    <div class="col-11"><h2>Hi, user  &nbsp;<span style="color: purple"> <?php echo $userRow['userName']; ?> </span>  </h2>
    </div>
  </div>

<div class="managePosts">
            <?php
            $sql = "SELECT `posts`.`postId`, `posts`.`postText`, `posts`.`postTime`, `users`.`userName`, `posts`.`recorderId`, `posts`.`active_notactive`, `posts`.`postSubject` FROM `posts` LEFT JOIN `users` ON `posts`.`fk_user` = `users`.`userName` WHERE (`posts`.`active_notactive` = 1) ORDER BY `posts`.`postTime`ASC";
            
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "
                            <div class='row'>
                                <div class='col-2'>
                                    <p><span style='color:#c0c'>Date</span><br>".$row['postTime']."</p>
                                </div>
                                <div class='col-1'>
                                    <p><span style='color:#c0c'>User</span><br>".$row['userName']."</p>
                                </div>
                                <div class='col-8'>
                                    <p><span style='color:#c0c'>Posted:</span><br>".$row['postText']."</p>
                                </div>
                                <div class='col-1'>
                                    <p><a href='user_create_comment.php?id=".$row['postId']."'><button class='btn btn-info' type='button'>comment</button></a></p>
                                </div>     
                            </div>
";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }

            ?>
        </tbody>
    </table>
</div>
<br><br>
  </div>

<span style="color:#c0c"></span>







<?php ob_end_flush(); ?>
<?php require_once 'footer.php'; ?>

