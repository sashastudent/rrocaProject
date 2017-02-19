<?php

include('includs/db.php');

$id=$_POST['id'];	

$query = "delete from tbl_item_223 where `index`=$id"; 

 $result= mysqli_query($connection, $query);

 if(!$result){
 	die("DB query failed - ".mysqli_error($connection)."<br> SQL <br>".$query."<br>FORM PARAMETERS<br>".file_get_contents("php://input"));
 }
 
?>