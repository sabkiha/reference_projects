<?php

require_once 'db_connect.php';
require_once 'navbar2.php';

?>

<div class="container">
    <div class="row">
        <fieldset>
            <legend>Add Event</legend>
            <form action="a_create.php" method="post">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Event Name</th>
                        <td><input type="text" name="eventName" placeholder="Event Name" /></td>
                    </tr>     
                    <tr>
                        <th>Start Date & Time</th>
                        <td><input type="datetime-local" name="startDate" placeholder="Start Date & Time" /></td>
                    </tr>
                    <tr>
                        <th>End Date & Time</th>
                        <td><input type="datetime-local" name="endDate" placeholder="End Date & Time" /></td>
                    </tr>     
                    <tr>
                        <th>Event Description</th>
                        <td><textarea name="description" cols="40" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><input type="text" name="image" placeholder="Image name.jpg" /></td>
                    </tr>     
                    <tr>
                        <th>Event Capacity</th>
                        <td><input type="text" name="capacity" placeholder="Capacity" /></td>
                    </tr>
                    <tr>
                        <th>Contact E-Mail Address</th>
                        <td><input type="text" name="contactEmail" placeholder="Contact E-Mail Address" /></td>
                    </tr>     
                    <tr>
                        <th>Contact Phone Number</th>
                        <td><input type="text" name="contactPhone" placeholder="Contact Phone Number" /></td>
                    </tr>
                    <tr>
                        <th>Location Name</th>
                        <td><input type="text" name="locName" placeholder="Location Name" /></td>
                    </tr>     
                    <tr>
                        <th>Event Address: Street & No</th>
                        <td><input type="text" name="eventLocStreet" placeholder="Event Address: Street & No" /></td>
                    </tr>
                    <tr>
                        <th>Event Address: City & Postcode</th>
                        <td><input type="text" name="eventLocCity" placeholder="Event Address: City & Postcode" /></td>
                    </tr>     
                    <tr>
                        <th>Event URL</th>
                        <td><input type="text" name="url" placeholder="Event Website" /></td>
                    </tr>
                    <tr>
                        <th>Event Type</th>
                        <td><input type="text" name="fk_eventType" placeholder="Event Type" /></td>
                    </tr> 
                    <tr>
                        <td><button type="submit" class="btn btn-primary">Add Event</button></td>
                        <td><a href="home.php"><button type="button" class="btn btn-secondary">Back to Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>        
    </div>
</div>



</body>
</html>