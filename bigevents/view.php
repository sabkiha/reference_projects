<?php 
session_start();

require_once 'db_connect.php';
require_once 'navbar.php';
?>

<div class="container-fluid bg-3 text-center">    
    <?php
    if($_GET) {
    $evId = $_GET['id'];
}
    $sql = "SELECT * FROM `events` WHERE id = {$evId}";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <div class='row'>
        <div class='col-sm-3'>
            <img src='img/".$row['image']."' class='img-responsive' style='width:100%' >
        </div>
        <div class='col-sm-4'>
            <h4>".$row['eventName']."</h4><br>
            <p>".$row['description']."<br> <br>
            ".$row['startDate']."&nbsp;until&nbsp;".$row['endDate']."<br>
            ".$row['locName']." <br>
            ".$row['eventLocStreet']." <br>
            ".$row['eventLocCity']." <br>
            </p>
            </div>
        <div class='col-sm-4'>
            <p>Maximal Attendance: ".$row['capacity']."<br> 
            For Questions mail: ".$row['contactEmail']." <br>
            or phone: ".$row['contactPhone']." <br>
            or find online: ".$row['url']." <br>
            </p>
           <a href='index.php'><button type='button' class='btn btn-secondary'>Back</button></a>
        </div>
       </div>
     ";
    }
    } else {
    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
}
?>     

</div><br><br>  

    <footer class="container-fluid text-center footer">
      <p>SaHa &amp; 2018</p>
    </footer>
</body>
</html>