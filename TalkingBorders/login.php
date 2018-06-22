<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 require_once 'navbar.php';

  // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }

  $error = false;

 if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
  $userName = trim($_POST['userName']);
  $userName = strip_tags($userName);
  $userName = htmlspecialchars($userName);

  $pass = trim($_POST['userPass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // prevent sql injections / clear user invalid inputs

  if(empty($userName)){
   $error = true;
   $userNameError = "Please enter your User Name.";
  } 
  // else if ( !filter_var($userName,FILTER_SANITIZE_STRING) ) {
  //  $error = true;
  //  $userNameError = "Please enter valid User Name.";
  // }

   if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {
   //$password = hash('sha256', $pass); // password hashing using SHA256
    $password = $pass;
   $res=mysqli_query($conn, "SELECT userId, userName, userPass, userNotes FROM users WHERE userName='$userName'");

   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   if ($count == 1 && $row['userPass']==$password && $row['userNotes'] == "admin") {
    $_SESSION['user'] = $row['userId']; 
    header("Location: admin_home.php");

    } elseif ($count == 1 && $row['userPass']==$password && $row['userNotes'] == "user") {
      $_SESSION['user'] = $row['userId']; 
      header("Location: user_home.php");

    } else {
        $errMSG = "You are not registered.";
    }
  }
 }

?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-6"><h1>Talking Borders.</h1></div>
      <div class="col-2"><img src="img/logo_fwf.png" alt="Logo FWF" style="max-height: 40px"></div>
      <div class="col-2"><img src="img/logo_univie.jpg" alt="Logo Vienna University" style="max-height: 40px"></div>
      <div class="col-2" ><img src="img/logo_abs.png" alt="Logo ABS" style="max-height: 40px"></div>
    </div>
      <h2>From Local Expertise to Global Exchange.</h2>
  </div><br>

  <div class="container-fluid bg-1 text-center">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-4">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
              <h2>Please log into your User Account:</h2>
              <p>You have received your user credentials in paper form during the experiment.</p>
             <hr />

  <?php

   if ( isset($errMSG) ) {
    echo $errMSG;
  }
   ?>

     <input type="name" name="userName" class="form-control" placeholder="Your User Name" value="<?php echo $userName; ?>" maxlength="40" />

     <span class="text-danger"><?php echo $userNameError; ?></span>

     <input type="password" name="userPass" class="form-control" placeholder="Your Password" maxlength="15" />

    <span class="text-danger"><?php echo $passError; ?></span>

     <hr />

     <button type="submit" name="btn-login" class="btn btn-info btn-lg">Log In</button>

     <hr />
    </form>
    </div>
  </div> 
    </div>

</body>
</html>

<?php ob_end_flush(); ?>

