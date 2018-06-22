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

<div class="container-fluid">

  <div class="row">
    <div class="col-8 offset-2"> <h2>Interview File Upload</h2><br></div>
  </div>

  <div class="row">
    <div class="col-8 offset-2">
    <form name="audio_form" id="audio_form" action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <label>Audio File:</label>
            <input name="audio_file" id="audio_file" type="file" />
            <input type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-info btn-sm"/>
        </fieldset>
    </form><br>
  
    <?php
    if(isset($_POST['Submit']))
    {
    $file_name = $_FILES['audio_file']['name'];

    if($_FILES['audio_file']['type']=='audio/mpeg' || $_FILES['audio_file']['type']=='audio/mpeg3' || $_FILES['audio_file']['type']=='audio/x-mpeg3' || $_FILES['audio_file']['type']=='audio/mp3' || $_FILES['audio_file']['type']=='audio/x-wav' || $_FILES['audio_file']['type']=='audio/wav')
    { 
     $new_file_name=$_FILES['audio_file']['name'];

     // Where the file is going to be placed
     $target_path = 'audios/'.$new_file_name;
     
     //target path where u want to store file.

      //following function will move uploaded file to audios folder. 
    if(move_uploaded_file($_FILES['audio_file']['tmp_name'], $target_path)) {

      //insert query if u want to insert file
    }
    echo "<p>File upload successful!</p>";

    } else {
    echo "
        <p>This file format is not supported. Please convert your audio file to a .mpeg3 .mp3 or .wav format.</p><a href='https://online-audio-converter.com/' target='_blank'>Online Audio File Converter</a>
                  ";
}


    }

?>
    </div>
  </div>

  <div class="row">
    <div class="col-8 offset-2">
      <h3>Information about interview file upload</h3>

      <p>The recording of your interview session must be a .mpeg3 .mp3 or .wav file.</p>
      <p>How to name your file
        <ul>
          <li>Student Family Name_Student Given Name-Scientist Family Name_Scientist Given Name.mp3/mpeg3/wav</li>
          <li>Example: Interview Partners are Miss Piggy (Student) and Kermit Frog (Scientist)</li>
          <li>Filename: Piggy_Miss-Frog_Kermit.mp3</li>
          <li>If your recording is in a different format, please convert to .mp3 (preferably) using <a href='https://online-audio-converter.com/' target='_blank'>Online Audio File Converter</a></li>
        </ul>
      </p>
    </div>

  </div>
</div>





<?php ob_end_flush(); ?>
<?php require_once 'footer.php'; ?>

