<?php

require_once 'db_connect.php';

if($_GET['id']) {
    $eid = $_GET['id'];
    $sql = "SELECT * FROM events WHERE id = {$eid}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();


?>

<?php require_once 'navbar.php'; ?>

<div class="container">
    <div class="row">
        <fieldset>
            <legend>Update Event</legend>
            <form action="a_update.php" method="post">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Event Name</th>
                        <td><input type="text" name="eventName" placeholder="Event Name" value="<?php echo $data['eventName'] ?>" /> 
                        </td>
                    </tr>     
                    <tr>
                        <th>Start Date & Time</th>
                        <td><input type="text" name="startDate" placeholder="Start Date & Time" value="<?php echo $data['startDate'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>End Date & Time</th>
                        <td><input type="text" name="endDate" placeholder="End Date & Time" value="<?php echo $data['endDate'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Event Description</th>
                        <td><input type="text" name="description" placeholder="description" value="<?php echo $data['description'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><input type="text" name="image" placeholder="Image" value="<?php echo $data['image'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Event Capacity</th>
                        <td><input type="text" name="capacity" placeholder="Event Capacity" value="<?php echo $data['capacity'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Contact E-Mail Address</th>
                        <td><input type="text" name="contactEmail" placeholder="Contact E-Mail Address" value="<?php echo $data['contactEmail'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Contact Phone Number</th>
                        <td><input type="text" name="contactPhone" placeholder="Contact Phone Number" value="<?php echo $data['contactPhone'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Location Name</th>
                        <td><input type="text" name="locName" placeholder="Location Name" value="<?php echo $data['locName'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Event Address: Street & No</th>
                        <td><input type="text" name="eventLocStreet" placeholder="Event Address: Street & No" value="<?php echo $data['eventLocStreet'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Event Address: City & Postcode</th>
                        <td><input type="text" name="eventLocCity" placeholder="Event Address: City & Postcode" value="<?php echo $data['eventLocCity'] ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th>Event URL</th>
                        <td><input type="text" name="url" placeholder="Event URL" value="<?php echo $data['url'] ?>" />
                        </td>
                    </tr>                    
                     <tr>
                        <th>Event Type</th>
                        <td><input type="text" name="fk_eventType" placeholder="Event Type" value="<?php echo $data['fk_eventType'] ?>" />
                        </td>
                    </tr>                   
                    <tr>
                        <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                        <td><button type="submit" class="btn btn-primary">Save Changes</button></td>
                        <td><a href="home.php"><button type="button" class="btn btn-secondary">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>       

    </div>
    





</div>

</body>
</html>

<?php
}

?>