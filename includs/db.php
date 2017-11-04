<?php
 //create a mySQL DB connection:
$dbhost = "127.0.0.1:3306";
$dbuser = "hbuser";
$dbpass = "hbuser";
$dbname = "hb_rocca";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($connection, "utf8");
 //testing connection success
 if(mysqli_connect_errno()) {
 die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
 );
 }
?>
