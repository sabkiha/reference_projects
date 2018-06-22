<?php
 ob_start();
 session_start();
 require_once 'actions/db_connect.php';

  // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }

 $error = false;
 $name ="";
 $passError="";
 $nameError="";


 if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
  $name = trim($_POST['userName']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // prevent sql injections / clear user invalid inputs

  if(empty($name)){
   $error = true;
   $nameError = "Please enter your user name.";
  } else if ( !filter_var($name,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $nameError = "Please enter valid user name.";
  }

   if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {
   
   $res=mysqli_query($conn, "SELECT userId, userName, userPass FROM users WHERE userName='$name'");
   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$pass ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect user credentials, please try again...";
   }
}
 }

require_once 'navbar.php';
?>

  <div class="container-fluid bg-1 text-center">
    <br>
    <div class="row justify-content-md-center">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <h2>Please log into the Digital Café using the details you received from the conference:</h2>
               <hr />
              <?php
               if ( isset($errMSG) ) {
                echo $errMSG; ?>
                <?php
               }?>
               <input type="userName" name="userName" class="form-control" placeholder="Please enter you User Name" value="<?php echo $name; ?>" maxlength="40" />
               <span class="text-danger"><?php echo $nameError; ?></span>
               <input type="password" name="pass" class="form-control" placeholder="Please enter your Password" maxlength="15" />
              <span class="text-danger"><?php echo $passError; ?></span>
               <hr />
               <button type="submit" name="btn-login" class="btn btn-block btn-primary">Log In</button>
               <hr />
      </form>      
    </div>
  </div>

</body>
</html>



