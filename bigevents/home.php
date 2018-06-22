<?php
 ob_start();
 session_start();

 require_once 'db_connect.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }

 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<?php

require_once 'navbar2.php';
?>

<div class="container-fluid bg-3 text-center">    
  <h1>Admin of all events</h1><a href='create.php'><button type='button' class='btn btn-primary'>Create Event</button></a>
  <br><br>
  <div class="row">
    <?php
    $sql = "SELECT * FROM `events`";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <div class='col-sm-2'>
        <img src='img/".$row['image']."' class='img-responsive' style='width:100%' alt='Image'>
        <p></p>
     <h4>".$row['eventName']."</h4><br><p>".$row['startDate']."<br> until <br>".$row['endDate']."<br>".$row['locName']." </p>

     <form action='a_update.php' method='get'>
     <a href='update.php?id=".$row['id']."'><button type='button' class='btn btn-success'>Edit Event</button></a>
     </form>

     <form action='a_delete.php' method='post'>
     <a href='delete.php?id=".$row['id']."'><button type='button' class='btn btn-danger'>Delete Event</button></a>
     </form>

     </div><br><br>
     ";
    }
    } else {
    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
}
?>     
    
  </div>
</div><br><br>  

    <footer class="container-fluid text-center footer">
      <p>SaHa &amp; 2018</p>
    </footer>
</body>
</html>