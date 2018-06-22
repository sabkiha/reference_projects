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
    body {
      background-color: #006;}
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
      <h3>This is the Big List of all media.    -> <a href="publisher.php">List of Publishers</a></h3>
    <?php 
    $sql = "SELECT media.id_media, 
      media.title, 
      author.first_name, 
      author.surname, 
      media.publish_date, 
      publisher.publisher_name, 
      media.isbn, 
      genre.genre_name, 
      media_type.media_name, 
      available.avail_name, 
      media.imageURL,
      media.short_description 
      FROM author
          LEFT JOIN media ON media.author = author.id_author
          LEFT JOIN available ON media.availability = available.id_avail
          LEFT JOIN genre ON media.genre = genre.id_genre
          LEFT JOIN publisher ON media.publisher = publisher.id_publisher
          LEFT JOIN media_type ON media.type = media_type.id_media_type";

      $result = mysqli_query($conn, $sql);

    echo"
      <table class='table'>
      <thead>
        <tr>
          <th>Media Id</th>
          <th>Title</th>
          <th>Author</th>
          <th>Publication Date</th>
          <th>Publisher</th>
          <th>ISBN</th>
          <th>Genre</th>
          <th>Media Type</th>
          <th>Availability</th>
          <th>Image</th>
          <th></th>
          </tr>
          <thead>
          <tbody>
          ";

    while($row = mysqli_fetch_assoc($result)) {
        echo"
            <tr>
               <td>". $row["id_media"]."</td>
               <td>". $row["title"]."</td>
               <td>". $row["first_name"]." ".$row["surname"]."</td>
               <td>". $row["publish_date"]."</td>
               <td>". $row["publisher_name"]."</td>
               <td>". $row["isbn"]."</td>
               <td>". $row["genre_name"]."</td>               
               <td>". $row["media_name"]."</td>
               <td>". $row["avail_name"]."</td>
               <td><img class='cover' src='". $row["imageURL"]."'></td>
               <td>
              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Blurb</button>
              <div class='modal fade' id='myModal'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h4 class='modal-title' style='color: black'>". $row["title"]."</h4>
                      <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>
                  <div class='modal-body' style='color: black'>". $row["short_description"]."</div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>
              </div>
              </div>
              </div>
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

