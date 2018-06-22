<?php
 ob_start();
 session_start();

 require_once 'dbconnect.php';

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
$servername = "localhost";
$username   = "root";
$password   = ""; 
$dbname     = "cr10_sabine_hartmann_biglibrary";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
  <link rel="icon" type="image/png" href="img/icon.png">
     <style> 
     body {
      background-color: #006;}
    .bg-1 { 
       background-color: #006;
        color: #ffffff;
      }
    .uw {
      color:  white;
      font-size: 20px;
      padding: 10px 0 0 0;
    }
    .cover {
      height: 200px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand"href="logout.php?logout">Logout</a>&nbsp
      <img src="img/icon.svg" alt="logo" style="width:40px;">&nbsp
    </a>
    <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">WHERE</a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="#">WHAT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">CONTACT</a>
      </li>
    </ul>
    <p class="uw">&nbsp&nbsp&nbspHi user: || <?php echo $userRow['userEmail']; ?> || nice that you are here today.</p>
  </nav>

  <div class="bg-1 table-responsive">
      <h3>Publisher List    <- <a href="home.php">Big List</a></h3>
    <?php 
    $sql = "
    SELECT `publisher`.`publisher_name`, `publisher`.`address`, `publisher_size`.`pub_name`
    FROM `publisher`
    LEFT JOIN `publisher_size` ON `publisher`.`size` = `publisher_size`.`id_publisher_size`";

      $result = mysqli_query($conn, $sql);

    echo"
      <table class='table'>
      <thead>
        <tr>
          <th>Publisher</th>
          <th>Address</th>
          <th>Company Size</th>
        </tr>
        <thead>
        <tbody>
          ";

    while($row = mysqli_fetch_assoc($result)) {
        echo"
            <tr>
               <td>". $row["publisher_name"]."</td>
               <td>". $row["address"]."</td>
               <td>". $row["pub_name"]."</td>
          </td>
        </tr>";
      }
           
      echo "</tbody></table>";

// Free result set

mysqli_free_result($result);


// Close connection

mysqli_close($conn);

 ?>



    
  </div>
 
            

</body>
</html>

<?php ob_end_flush(); ?>

