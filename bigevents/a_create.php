<?php

require_once 'db_connect.php';

require_once 'navbar2.php';

if($_POST) {
    $eventName = $_POST['eventName'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $capacity = $_POST['capacity'];
    $contactEmail = $_POST['contactEmail'];
    $contactPhone = $_POST['contactPhone'];
    $locName = $_POST['locName'];
    $eventLocStreet = $_POST['eventLocStreet'];
    $eventLocCity = $_POST['eventLocCity'];
    $url = $_POST['url'];
    $fk_eventType = $_POST['fk_eventType'];

    $sql = "INSERT INTO events (eventName, startDate, endDate, description, image, capacity, contactEmail, contactPhone, locName, eventLocStreet, eventLocCity, url, fk_eventType) VALUES ('$eventName', '$startDate', '$endDate', '$description', '$image', '$capacity', '$contactEmail', '$contactPhone', '$locName', '$eventLocStreet', '$eventLocCity', '$url', '$fk_eventType')";
    if($conn->query($sql) === TRUE) {
        echo "<p>New Event Successfully Created</p>";
        echo "<a href='create.php'><button type='button' class='btn btn-info'>Back</button></a>";
        echo "<a href='home.php'><button type='button' class='btn btn-secondary'>Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $conn->connect_error;
    }

    $conn->close();
}
?>
</body>
</html>