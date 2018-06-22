<?php

require_once 'db_connect.php';

require_once 'navbar2.php';

if($_POST) {
    $eeventName = $_POST['eventName'];
    $estartDate = $_POST['startDate'];
    $eendDate = $_POST['endDate'];
    $edescription = $_POST['description'];
    $eimage = $_POST['image'];
    $ecapacity = $_POST['capacity'];
    $econtactEmail = $_POST['contactEmail'];
    $econtactPhone = $_POST['contactPhone'];
    $elocName = $_POST['locName'];
    $eeventLocStreet = $_POST['eventLocStreet'];
    $eeventLocCity = $_POST['eventLocCity'];
    $eurl = $_POST['url'];
    $efk_eventType = $_POST['fk_eventType'];
    $eid = $_POST['id'];

    $sql = "UPDATE events 
    SET eventName= '$eeventName', 
    startDate = '$estartDate', 
    endDate = '$eendDate', 
    description = '$edescription', 
    image = '$eimage', 
    capacity = '$ecapacity', 
    contactEmail = '$econtactEmail', 
    contactPhone = '$econtactPhone', 
    locName = '$elocName', 
    eventLocStreet = '$eeventLocStreet', 
    eventLocCity = '$eeventLocCity', 
    url = '$eurl', 
    fk_eventType = '$efk_eventType'
    WHERE id = {$eid}";

    if($conn->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='update.php?id=".$eid."'><button type='button' class='btn btn-info'>Back</button></a>";
        echo "<a href='home.php'><button type='button' class='btn btn-secondary'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $conn->error;
    }

    $conn->close();
}

?>
</body>
</html>