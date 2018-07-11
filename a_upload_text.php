<?php

require_once 'db_connect.php';
require_once 'navbar.php';

if($_POST) {
    $ptext = $_POST['post_text'];
    $user = $_POST['fk_user'];
    $reI = $_POST['recorderId'];    

    $sql = "INSERT INTO posts (postText, fk_user, recorderId) VALUES ('$ptext',  '$user', '$reI')";
    if($conn->query($sql) === TRUE) {
        echo "<p>Text Fragment Successfully Uploaded</p>";
        echo "<a href='admin_upload_text.php'><button type='button'>Back to Text Upload</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $conn->connect_error;
    }

    $conn->close();
}

?>
<?php require_once 'footer.php'; ?>