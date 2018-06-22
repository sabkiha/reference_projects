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
      <a class="btn btn-info btn-lg" href="user_home.php" role="button">Admin Home</a>
    </div>  
  </div><br>

<div class="container-fluid">
	<h1>USER MENU</h1>
    <div class="row">
        <div class="col-1">
        </div>
        <div class="col-2">
          <a class="btn btn-info btn-lg" href="home.php" role="button">Digital Café</a>
        </div>
        <div class="col-2">
          <a class="btn btn-info btn-lg" href="admin_upload_text.php" role="button">Upload Texts</a>
        </div>     	
        <div class="col-2">
          <a class="btn btn-info btn-lg" href="admin_upload.php" role="button">Upload Interview File</a>
        </div>
        <div class="col-1">
        </div>   
    </div>
</div>





<?php ob_end_flush(); ?>
<?php require_once 'footer.php'; ?>

