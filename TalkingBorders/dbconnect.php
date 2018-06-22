<?php
 // this will avoid mysql_connect() deprecation error.

 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
 define('DBHOST', 'talkingb.mysql.univie.ac.at');
 define('DBUSER', 'talkingb');
 define('DBPASS', 'F2A-4cN5tD');
 define('DBNAME', 'talkingb');

 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }

 

 ?>