<html lang="en">
<head>
    <title>Talking Borders. From Local Expertise to Global Exchange.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=BenchNine" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="img/discussion.png">

</head>

<body>
    <div class="container-fluid">

<?php

require_once 'db_connect.php';

if($_POST) {
    $ptext = $_POST['post_text'];
    $pdate = $_POST['post_date'];
    $usr = $_POST['user'];
    $act = $_POST['active'];
    $id = $_POST['id'];

    $sql = "UPDATE posts SET postText = '$ptext', postTime = '$pdate', fk_user = '$usr', active_notactive = '$act'  WHERE postId = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update.php?id=".$id."'><button type='button' class='btn btn-info'>Back</button></a>&nbsp;"; 
        echo "<a href='../admin_posts.php'><button type='button' class='btn btn-info'>Admin List</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }

    $connect->close();
}

?>

    </div>
</body>
</html>