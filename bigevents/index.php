<?php 
session_start();

require_once 'db_connect.php';

require_once 'navbar.php';
?>

<div class="container-fluid bg-3 text-center">    
  <h1>All our upcoming events ...</h1>
  <br>
  <div class="row">
    <?php
    $sql = "SELECT * FROM `events`";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <div class='col-sm-3'>
        <img src='img/".$row['image']."' class='img-responsive' style='width:100%' alt='Image'>
        <p></p>
     <h4>".$row['eventName']."</h4><br><p>".$row['startDate']."<br> until <br>".$row['endDate']."<br>".$row['locName']." </p>
     <form action='' method='get'>
     <a href='view.php?id=".$row['id']."'><button type='button' class='btn btn-primary'>Details</button></a>
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