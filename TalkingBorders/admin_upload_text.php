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
        <a class="btn btn-info btn-lg" href="user_home.php" role="button">User Menu</a>
    </div>  
  </div><br><br>


  <div class="row">
    <div class="col-11"><h2>Welcome - User Name: &nbsp;&nbsp;<span style="color: purple"> <?php echo $userRow['userName']; ?> </span>  </h2>
    </div>
  </div><br>
</div>

<?php 
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();
 ?>

<div class="container-fluid">

  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
      <h2>Upload Area for Transcribed Interview Fragments</h2>
      <h4>Citizen scientists are invited to upload up to three transcribed fragments from the face-to-face dialogue here.</h4>

      <form action="actions/a_upload_text.php" method="post" style="display:grid">
        <table cellspacing="0" cellpadding="0">
          <tr>
            <th>Please copy/paste or write your text fragment here:</th>
            <td>
              <textarea type="text" name="post_text" placeholder="Post Text"cols="100" rows="5"></textarea>
            </td>
          </tr>
          <tr>
                  <th>Your User Name</th>
                  <td><input type="text" name="fk_user" placeholder="User Name" value="<?php echo $userRow['userName']; ?>" /></td>
              </tr> 
              <tr>
                  <th>Number of recording device</th>
                  <td><input type="text" name="recorderId" placeholder="Number of recording device"/></td>
              </tr>
              <tr>
                  <td>
                      <input type="hidden" name="id" value="<?php echo $_SESSION['user']?>" /><button type="submit" class='btn btn-info btn-sm'>Submit Text</button>
                  </td>
              </tr>
          </table>
      </form>







<!--https://codepen.io/jhawes/pen/xwgEaP explains how to limit number of words in a textarea  -->

        <br>
        <input type="submit" value="Submit">
      </form> <br>
    </div>
  </div>
</div>





<?php ob_end_flush(); ?>
<?php require_once 'footer.php'; ?>

